# Configurazione Tenant e TenantService

**Scopo**: centralizzare tutta la configurazione multi-tenant in un unico servizio sottile (`TenantService`) che delega la business logic ad **Actions** dedicate (Spatie QueueableAction), in linea con Super Mucca e architettura Laraxot.

---

## Ruolo di `TenantService`

- **Facade sottile**: tutti i metodi pubblici espongono API stabili e leggibili.
- **Business logic nelle Actions**: ogni metodo chiave delega ad una Action:
  - `getName()` → `GetTenantNameAction`
  - `filePath()` → `Config\GetTenantFilePathAction`
  - `config()` → `Config\ResolveTenantConfigValueAction`
  - `getConfigPath()` → `Config\GetTenantConfigPathAction`
  - `getConfig()` → `Config\GetTenantConfigArrayAction`
  - `saveConfig()` → `Config\SaveTenantConfigAction`
  - `modelClass()` → `Models\ResolveTenantModelClassAction`
  - `model()` → `Models\ResolveTenantModelInstanceAction`
  - `localizedMarkdownPath()` → `Markdown\GetLocalizedMarkdownPathAction`
  - `trans()` → `Translations\TranslateTenantKeyAction`
  - `getConfigNames()` → `Config\GetTenantConfigNamesAction`
  - `allModules()` → `Modules\GetTenantModulesAction`

**Perché**:
- separazione netta tra **API di dominio** (service) e **implementazione tecnica** (actions),
- facilità di test, refactor e queue/offload grazie alle QueueableAction,
- riduzione complessità ciclomatica dentro il service.

---

## Pattern Configurazione

- I file di config tenant-specific si trovano in `config/<tenant_name>/...`.
- Le Actions di configurazione usano sempre percorsi costruiti via:
  - `GetTenantNameAction` per determinare il tenant corrente,
  - `Config\GetTenantFilePathAction` per costruire il path fisico.
- La merge-logica tra:
  - configurazione **globale** (`config($group)`),
  - configurazione **tenant** (`config('<tenant>.<group>')`),
  - override dinamici (es. `morph_map` in admin),
  è centralizzata in `ResolveTenantConfigValueAction`.

Per i dettagli qualitativi (PHPStan L10, PHPMD, PHPInsights) fare riferimento a:

- [`../../Xot/docs/php_quality_guide.md`](../../Xot/docs/php_quality_guide.md)
- [`../../Xot/docs/super_cow_methodology.md`](../../Xot/docs/super_cow_methodology.md)

---

## Linee Guida di Utilizzo

- **Da fuori modulo**:
  - usare SEMPRE `TenantService::<metodo>()` e NON le Actions direttamente.
- **Dentro il modulo Tenant**:
  - usare le Actions quando serve riutilizzare logica in contesti asincroni (queue, batch, CLI),
  - mantenere le Actions piccole, focalizzate e tipate (PHPStan Level 10).

Questo file documenta la **filosofia** e lo **scopo** del sistema di configurazione Tenant; per la business logic dettagliata vedere anche:

- `./business-logic-deep-dive.md`
- `./helper-functions-dependency.md`
