# Roadmap - Modulo Tenant

## Scopo
Gestione multi-tenant su base organizzazioni/team con isolamento dati, policies e provisioning automatico.

## Obiettivi
- **Isolamento dati** per tenant e team (query scopes, policies, filtri Filament)
- **Provisioning tenant** (creazione, onboarding, ruoli di default, permessi)
- **Policy di sicurezza** (rate limit, 2FA required per ruoli critici, session hardening)
- **Osservabilità** (audit log eventi tenant, metriche utilizzo)

## Architettura
- `TenantManager` centralizza contesto (tenantId, teamId)
- Scopes Eloquent e middleware per propagare contesto
- Integrazione con `Modules\\User` per ruoli/permessi per-tenant
- Integrazione con `Modules\\Cms` per visibilità contenuti per-tenant

## Piano di Lavoro
### Fase 1 – Foundation (Completata/Verifica)
- [ ] Verifica scopes globali su modelli core (User, Team, Profile)
- [ ] Policy base di accesso per tenant corrente
- [ ] Integrazione Filament: filtro tenant nelle tabelle e form

### Fase 2 – Provisioning (In Corso)
- [ ] Action: CreateTenantAction (DTO input, ruoli default, team owner)
- [ ] Seeder ruoli-permessi standard per ogni tenant
- [ ] Job asincroni per onboarding (notifiche, settaggi iniziali)

### Fase 3 – Security Hardening (Pianificata)
- [ ] Enforce 2FA per ruoli admin su tenant
- [ ] Rate limiting per operazioni sensibili
- [ ] Session policies per device management

### Fase 4 – Osservabilità e Ops (Pianificata)
- [ ] Audit trail per cambi contesto tenant
- [ ] Metriche per pannello admin (per-tenant usage)
- [ ] Export/Backup impostazioni tenant

## Collegamenti
- User module: `../../User/docs/`
- CMS module: `../../Cms/docs/`
- Linee guida Filament v4: https://filamentphp.com/docs/4.x/overview

## Note Qualità
- PHPStan livello 9 mandatory
- Vietato estendere classi Filament direttamente (usare XotBase classes)
- Docs-first: aggiornare documentazione per ogni cambiamento architetturale
