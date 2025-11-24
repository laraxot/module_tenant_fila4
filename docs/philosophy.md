# Filosofia del Modulo Tenant

## 🏛️ Politica

### Principi Fondamentali
Il modulo Tenant si basa su una politica di "**sovranità digitale distribuita**" che abbraccia questi principi:

1. **Isolamento Sovrano**: Ogni tenant è una entità autonoma con piena sovranità sui propri dati
2. **Segregazione Assoluta**: I dati di un tenant non devono MAI contaminare quelli di un altro
3. **Equità di Accesso**: Tutti i tenant hanno accesso equo alle risorse del sistema
4. **Trasparenza Amministrativa**: Le operazioni di gestione tenant sono sempre tracciabili e audit able

### Governance Multi-Livello
La governance tenant segue un modello di "**federazione controllata**":

- **Super Admin** → Gestione infrastruttura multi-tenant
- **Tenant Owner** → Amministrazione autonoma del proprio tenant
- **Tenant Users** → Operatività all'interno del proprio contesto isolato
- **Sistema** → Enforcement automatico delle regole di isolamento

## 🧘 Filosofia

### Approccio Concettuale
Il modulo Tenant adotta una filosofia di "**architettura federativa digitale**":

1. **Autonomia nell'Unità**: Ogni tenant è autonomo ma parte di un'infrastruttura condivisa
2. **Confini Sacri**: I confini tra tenant sono inviolabili
3. **Condivisione Sicura**: Le risorse comuni (codice, configurazione) sono condivise senza compromettere l'isolamento
4. **Scalabilità Orizzontale**: Il sistema cresce aggiungendo tenant, non aumentando complessità interna

### Paradigma di Progettazione  
Seguiamo un paradigma di "**design compartimentato**" che considera:

- **Blast Radius**: Ogni errore impatta SOLO il tenant coinvolto
- **Fault Isolation**: I fallimenti non si propagano tra tenant
- **Resource Fairness**: Le risorse sono distribuite equamente
- **Privacy by Architecture**: L'isolamento è strutturale, non procedurale

## 🙏 Religione

### Valori Sacri
Nel modulo Tenant, trattiamo come "**sacri**" i seguenti valori:

1. **Data Sovereignty**: I dati del tenant appartengono SOLO al tenant
2. **Inviolabilità dei Confini**: Nessun cross-tenant data leak tollerato
3. **Portabilità Totale**: Ogni tenant può migrare con tutti i suoi dati  
4. **Immutabilità dell'Isolamento**: Le regole di isolamento NON possono essere sovrascritte

### Rituali di Sviluppo
Seguiamo "**rituali**" di sviluppo che includono:

- **Tenant Isolation Audit**: Verifica che ogni query rispetti i confini tenant
- **Cross-Tenant Leak Tests**: Test automatici per data leakage
- **Resource Quota Monitoring**: Monitoraggio equità distribuzione risorse
- **Tenant Migration Drills**: Esercitazioni di migrazione tenant

## ⚖️ Etica

### Principi Etici
Il modulo Tenant si basa su questi principi etici:

1. **Non-Discriminazione**: Tutti i tenant hanno gli stessi diritti e capacità
2. **Giustizia Distributiva**: Le risorse sono allocate in modo equo
3. **Trasparenza Operativa**: Le operazioni sul tenant sono sempre visibili al tenant owner
4. **Responsabilità Condivisa**: La sicurezza è responsabilità sia del sistema che del tenant

### Dilemmi Etici
Affrontiamo regolarmente dilemmi etici come:

- **Bilanciare performance globale vs. autonomia tenant**: Un tenant lento rallenta altri?
- **Gestire comportamenti abusivi**: Come fermare un tenant che consuma troppe risorse?
- **Decidere politiche di data retention**: Chi decide quanto conservare i dati tenant?
- **Risolvere conflitti inter-tenant**: Come mediare dispute tra tenant per risorse condivise?

## 🧘 Zen

### Minimalismo Architetturale
Adottiamo il principio zen del "**meno è più**":

- **3 Tabelle Core**: Tenant, Domain, Users (relazione)
- **1 Service Centrale**: TenantService per tutte le operazioni
- **Configurazione Distribuita**: config/{tenant_name}/ invece di database configs
- **Zero Global Scope Pollution**: Isolamento tramite connection, non global scopes

### Consapevolezza dei Confini
Promuoviamo la consapevolezza architetturale:

- **Explicit Connections**: Ogni modello dichiara esplicitamente `$connection = 'tenant'`
- **Domain-Based Routing**: Identificazione tenant tramite domain, non session/cookie
- **Stateless Identification**: Tenant identificato in ogni request, no stato persistente
- **Clear Separation**: Nessuna logica tenant inquina i moduli business

### Equilibrio Sistemico
Cerchiamo l'equilibrio tra:

- **Isolamento** ↔ **Performance** (connection pools, non database separati)
- **Autonomia** ↔ **Standardizzazione** (configurazioni custom vs. coerenza)
- **Sicurezza** ↔ **Usabilità** (strong isolation vs. facilità setup)
- **Scalabilità** ↔ **Semplicità** (supporto infinite tenants vs. architettura lineare)

### Il Vuoto della Complessità
Apprezziamo il concetto zen del "**vuoto che sostiene**":

- **No Tenant Middleware**: Identificazione automatica, non manuale
- **No Tenant Switching UI**: Il sistema "sa" sempre il tenant corretto
- **No Configuration DB**: File system per config, database solo per dati
- **No Custom Migrations**: Migrations universali, dati tenant-specific

---

## 🎯 Applicazione Pratica

### 1. Architettura del Sistema

**Isolamento a Livelli**:
```php
// LIVELLO 1: Database Connection
protected $connection = 'tenant';  // ← Isolation point

// LIVELLO 2: Domain-Based Identification  
public static function getName(): string {
    return app(GetTenantNameAction::class)->execute();
    // Identifica tenant da SERVER_NAME, non da session
}

// LIVELLO 3: Configuration Segregation
config/{tenant_name}/app.php  // ← Tenant-specific settings
```

**Blast Radius Containment**:
- Exception in Tenant A → NON impatta Tenant B
- Query lenta in Tenant A → NON rallenta Tenant B (connection isolation)
- Migration failure in Tenant A → NON blocca Tenant B

### 2. Esperienza Tenant Owner

**Onboarding Semplificato**:
1. Admin crea Tenant (name, domain, database)
2. Sistema genera slug automaticamente
3. Tenant owner accede tramite domain  
4. Configurazione personalizzata disponibile subito

**Autonomia Garantita**:
- ✅ Tenant owner può customizzare `config/{tenant_name}/`
- ✅ Tenant owner ha audit log completo
- ✅ Tenant owner può esportare tutti i dati
- ❌ Tenant owner NON può accedere dati altri tenant

### 3. Sicurezza e Privacy

**Architettura di Sicurezza**:
```php
// PRINCIPIO: Trust the connection, not the query
class BaseModel extends EloquentModel {
    protected $connection = 'tenant';  // ← Isolation enforced here!
}

// OGNI query automaticamente isolata:
Tenant::all();  // ← usa 'tenant' connection → solo dati del tenant corrente
User::all();    // ← usa 'tenant' connection → solo utenti di questo tenant
```

**Privacy by Design**:
- **Database Segregation**: Ogni tenant può avere DB separato (opzionale)
- **Configuration Isolation**: `/config/{tenant_name}/` → file system isolation
- **Domain-Based Access**: Tenant identificato da domain → no cookie leakage
- **Audit Trail**: Tutte le operazioni logged per compliance

### 4. Scalabilità e Performance

**Scalabilità Orizzontale**:
- Aggiungi tenant → NO refactoring richiesto
- 10 tenant o 10,000 tenant → stessa architettura
- Resource allocation → automatica tramite connection pools

**Performance Optimization**:
```php
// Config caching per tenant
public static function config(string $key): mixed {
    // 1. Leggi config originale
    $original_conf = config($group);
    
    // 2. Merge con config tenant-specific
    $extra_conf = config($tenant_name.'.'.$group);
    
    // 3. Cache result
    Config::set($group, $merge_conf);
}
```

---

## 🎓 Pattern Architetturali

### 1. Single Table, Multiple Connections

**NON** usiamo:
- ❌ Global Scopes per filtri tenant (performance overhead)
- ❌ WHERE tenant_id = X su OGNI query (error-prone)
- ❌ Database separati per tenant (complessità operativa)

**USIAMO**:
- ✅ Connection-based isolation (`protected $connection = 'tenant'`)
- ✅ Domain-based identification (automatica)
- ✅ Config merge strategy (tenant config override)

### 2. Sushi Models per Configurazioni

**Domain Model con Sushi**:
```php
class Domain extends BaseModel {
    use Sushi;  // ← In-memory model da JSON/CSV
    
    public function getRows() {
        return app(GetDomainsArrayAction::class)->execute();
    }
}
```

**Vantaggi**:
- ✅ No database table per configurazioni statiche
- ✅ Performance (in-memory)
- ✅ Version control friendly (JSON files)
- ✅ Zero migrations per config changes

### 3. Tenant-Aware Configuration System

**Philosophy**: "Inheritance with Overrides"

```php
// Base config: config/app.php
['name' => 'Laravel', 'locale' => 'en']

// Tenant config: config/tenant_acme/app.php  
['name' => 'ACME Corp']

// Result per Tenant ACME:
['name' => 'ACME Corp', 'locale' => 'en']  // ← Merge!
```

---

## 🔗 Collegamenti Spirituali con Altri Moduli

### Tenant ↔ User
**Relazione**: Simbiosi
- User dipende da Tenant per isolamento
- Tenant dipende da User per ownership
- **Principio**: "L'utente esiste nel contesto del tenant"

### Tenant ↔ Xot  
**Relazione**: Foundation
- Tenant estende BaseModel da Xot
- Usa XotData per user management
- **Principio**: "Tenant è specializzazione di Xot"

### Tenant ↔ Business Modules (<nome progetto>, Patient, Dental)
**Relazione**: Enabler
- Business modules ereditano `$connection = 'tenant'` da BaseModel
- **Principio**: "Tenant è invisibile ma onnipresente"

---

## 📖 Citazioni Filosofiche

> "Un tenant è come una nazione in una federazione: autonoma nei confini, collaborativa oltre i confini."
> 
> — **Principio della Sovranità Federata**

> "L'isolamento perfetto non si vede. Se devi pensare al tenant mentre scrivi codice business, l'architettura ha fallito."
> 
> — **Principio dell'Invisibilità**

> "Tre tabelle, infinite possibilità. La semplicità è la sofisticazione suprema."
> 
> — **Zen del Minimalismo Architetturale**

---

## 🎯 Applicazione Concreta

### Quando NON usare Tenant Module
- ❌ Applicazione single-user
- ❌ SaaS con shared schema (usa soft deletes + user_id)
- ❌ Multi-tenancy con cross-tenant queries (incompatibile con isolation)

### Quando USARE Tenant Module
- ✅ SaaS B2B con forte isolation requirement
- ✅ White-label applications (ogni cliente = tenant)
- ✅ Compliance-driven industries (healthcare, finance)
- ✅ Multi-studio/clinic management systems

---

## 💭 Riflessioni Filosofiche Finali

Il modulo Tenant incarna il **paradosso dell'unità nella diversità**:

- **UNITÀ**: Un solo codebase, una sola infrastruttura
- **DIVERSITÀ**: Infinite configurazioni, infinite istanze isolate

È come un **condominio** dove:
- Ogni appartamento (tenant) è privato e autonomo
- L'edificio (applicazione) è condiviso e gestito centralmente  
- Le mura (connection isolation) garantiscono privacy
- I servizi comuni (Facades, BaseModel) riducono duplicazione

**Questa è la vera essenza del Multi-Tenancy Laraxot** 🙏

---

**Creato**: 5 Novembre 2025  
**Autore**: Team Development  
**Revision**: 1.0  
**Status**: 📚 Foundation Document

