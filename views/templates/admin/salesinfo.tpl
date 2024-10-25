<div class="panel sales-info-panel">
    <h3>{l s='Información de Ventas BPM' d='bpm_salesinfo'}</h3>
    <div class="sales-info-header">
        <h2>{l s='Valor de las ventas' d='bpm_salesinfo'}</h2>
    </div>
    <div class="sales-info-container">
        <div class="sales-info-box">
            <h4>{l s='Ventas hoy' d='bpm_salesinfo'}</h4>
            <p>{if $ventasHoy}{$ventasHoy}{else}{l s='Sin datos aún' d='bpm_salesinfo'}{/if}</p>
            <small>{l s='Ayer' d='bpm_salesinfo'}: {if $ventasAyer}{$ventasAyer}{else}{l s='Sin datos aún' d='bpm_salesinfo'}{/if}</small>
            <div class="change-percentage {if $cambioHoy > 0}green-progress{elseif $cambioHoy < 0}red-progress{/if}">
                ({$cambioHoy}% {if $cambioHoy > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h4>{l s='Ventas esta semana' d='bpm_salesinfo'}</h4>
            <p>{if $ventasSemana}{$ventasSemana}{else}{l s='Sin datos aún' d='bpm_salesinfo'}{/if}</p>
            <small>{l s='Semana pasada' d='bpm_salesinfo'}: {if $ventasSemanaPasada}{$ventasSemanaPasada}{else}{l s='Sin datos aún' d='bpm_salesinfo'}{/if}</small>
            <div class="change-percentage {if $cambioSemana > 0}green-progress{elseif $cambioSemana < 0}red-progress{/if}">
                ({$cambioSemana}% {if $cambioSemana > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h4>{l s='Ventas este mes' d='bpm_salesinfo'}</h4>
            <p>{if $ventasMes}{$ventasMes}{else}{l s='Sin datos aún' d='bpm_salesinfo'}{/if}</p>
            <small>{l s='Mes pasado' d='bpm_salesinfo'}: {if $ventasMesPasado}{$ventasMesPasado}{else}{l s='Sin datos aún' d='bpm_salesinfo'}{/if}</small>
            <div class="change-percentage {if $cambioMes > 0}green-progress{elseif $cambioMes < 0}red-progress{/if}">
                ({$cambioMes}% {if $cambioMes > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h4>{l s='Ventas este año' d='bpm_salesinfo'}</h4>
            <p>{if $ventasYear}{$ventasYear}{else}{l s='Sin datos aún' d='bpm_salesinfo'}{/if}</p>
            <small>{l s='Año pasado' d='bpm_salesinfo'}: {if $ventasYearPasado}{$ventasYearPasado}{else}{l s='Sin datos aún' d='bpm_salesinfo'}{/if}</small>
            <div class="change-percentage {if $cambioYear > 0}green-progress{elseif $cambioYear < 0}red-progress{/if}">
                ({$cambioYear}% {if $cambioYear > 0}↑{else}↓{/if})
            </div>
        </div>
    </div>
</div>
