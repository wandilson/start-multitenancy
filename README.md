# Start Aplicação Multitenant

Base para uma aplicação MULTITENANT, contendo toda a parte administrativa para gerenciamento de tenant.

<br>

##### Recursos
Laravel 8
Jetstream + Livewire
TailwindCss

<br>

##### Features
- [x] Registro de Tenant
- [x] Gestão de usuários por Tenant
- [ ] ACL "Módulo => Permissões"
- [ ] Gerenciar Informações do Tenant
    - Logo
    - Nome Fantasia
    - E-mail

<br>

1. Gera e faz a inserção automatica do uuid ao cadastrar um novo Tenant "Empresa"

```php
# App\Models\Tenant

    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }
```

<br>

2. Método isolado responsável por todas as regras referentes aos tenants

```php
# App\Tenant\Traits;

use App\Observers\Tenant\ObserverTenant;
use App\Scopes\Tenant\TenantScope;

trait TenantTraits
{
    protected static function booted()
    {   
        if(auth()->check()) {
            static::addGlobalScope(new TenantScope);
            static::observe(new ObserverTenant);
        }        
    }
}
```
***Como Usar: Em todas as models que precisem filtrar conteúdo somente do tenant ou inserir o id o tenant automaticamente no create***
```php
# App\Models\User;

use App\Tenant\Traits\TenantTraits;

class User extends Authenticatable
{
    use TenantTraits;
}
```

<br>

3. Methodo responsável por inserir automaticamente o id do tenant nos create

```php
# App\Observer\ObserverTenant

    public function creating(Model $model)
    {
        $tenant = app(ManagerTenant::class)->getTenantIdentify();
        $model->setAttribute('tenant_id', $tenant);
    }

Exemplo de Uso:
# App\Model\User

    protected static function booted()
    {   
        if(auth()->check()) { // verifica se o usuário esta logado
            static::observe(new ObserverTenant); // Carrega classe responsável por inserir o tenant no create
        }        
    }
