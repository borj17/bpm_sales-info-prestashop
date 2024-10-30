<div class="panel sales-info-panel">
    <h2>{l s='Sales Information' mod='bpm_salesinfo'}</h2>
    <div class="sales-info-container">
        <div class="sales-info-box">
            <h3>{l s='Sales today' mod='bpm_salesinfo'}</h3>
            <p>{if $ventasHoy}{$ventasHoy} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Yesterday' mod='bpm_salesinfo'}: {if $ventasAyer}{$ventasAyer} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $cambioHoy > 0}green-progress{elseif $cambioHoy < 0}red-progress{/if}">
                ({$cambioHoy}% {if $cambioHoy > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h3>{l s='Sales this week' mod='bpm_salesinfo'}</h3>
            <p>{if $ventasSemana}{$ventasSemana} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last week' mod='bpm_salesinfo'}: {if $ventasSemanaPasada}{$ventasSemanaPasada} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $cambioSemana > 0}green-progress{elseif $cambioSemana < 0}red-progress{/if}">
                ({$cambioSemana}% {if $cambioSemana > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h3>{l s='Sales this month' mod='bpm_salesinfo'}</h3>
            <p>{if $ventasMes}{$ventasMes} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last month' mod='bpm_salesinfo'}: {if $ventasMesPasado}{$ventasMesPasado} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $cambioMes > 0}green-progress{elseif $cambioMes < 0}red-progress{/if}">
                ({$cambioMes}% {if $cambioMes > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h3>{l s='Sales this year' mod='bpm_salesinfo'}</h3>
            <p>{if $ventasYear}{$ventasYear} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last year' mod='bpm_salesinfo'}: {if $ventasYearPasado}{$ventasYearPasado} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $cambioYear > 0}green-progress{elseif $cambioYear < 0}red-progress{/if}">
                ({$cambioYear}% {if $cambioYear > 0}↑{else}↓{/if})
            </div>
        </div>
    </div>
   
    <div class="sales-info-header">
        <h2>{l s='Abandoned Carts' mod='bpm_salesinfo'}</h2>
    </div>

    <div class="sales-info-container">
        <div class="sales-info-box">
            <h3>{l s='Abandoned carts today' mod='bpm_salesinfo'}</h3>
            <p>{if $carritosHoy}{$carritosHoy}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Yesterday' mod='bpm_salesinfo'}: {if $carritosAyer}{$carritosAyer}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $cambioCarritosHoy > 0}green-progress{elseif $cambioCarritosHoy < 0}red-progress{/if}">
                ({$cambioCarritosHoy}% {if $cambioCarritosHoy > 0}↓{else}↑{/if})
            </div>
        </div>

        <div class="sales-info-box">
            <h3>{l s='Abandoned carts this week' mod='bpm_salesinfo'}</h3>
            <p>{if $carritosSemana}{$carritosSemana}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last week' mod='bpm_salesinfo'}: {if $carritosSemanaPasada}{$carritosSemanaPasada}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $cambioCarritosSemana > 0}green-progress{elseif $cambioCarritosSemana < 0}red-progress{/if}">
                ({$cambioCarritosSemana}% {if $cambioCarritosSemana > 0}↓{else}↑{/if})
            </div>
        </div>

        <div class="sales-info-box">
            <h3>{l s='Abandoned carts this month' mod='bpm_salesinfo'}</h3>
            <p>{if $carritosMes}{$carritosMes}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last month' mod='bpm_salesinfo'}: {if $carritosMesPasado}{$carritosMesPasado}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $cambioCarritosMes > 0}green-progress{elseif $cambioCarritosMes < 0}red-progress{/if}">
                ({$cambioCarritosMes}% {if $cambioCarritosMes > 0}↓{else}↑{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h3>{l s='Carts abandoned this year' mod='bpm_salesinfo'}</h3>
            <p>{if $carritosYear}{$carritosYear}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last year' mod='bpm_salesinfo'}: {if $carritosYearPasado}{$carritosYearPasado}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $cambioCarritosYear > 0}green-progress{elseif $cambioCarritosYear < 0}red-progress{/if}">
                ({$cambioCarritosYear}% {if $cambioCarritosYear > 0}↓{else}↑{/if})
            </div>
        </div>
    </div>
</div>
