<div class="panel sales-info-panel">
    <h2>{l s='Sales Information' mod='bpm_salesinfo'}</h2>
    <div class="sales-info-container">
        <div class="sales-info-box">
            <h3>{l s='Sales today' mod='bpm_salesinfo'}</h3>
            <p>{if $salesToday}{$salesToday} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Yesterday' mod='bpm_salesinfo'}: {if $salesYesterday}{$salesYesterday} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $salesImprovementToday > 0}green-progress{elseif $salesImprovementToday < 0}red-progress{/if}">
                ({$salesImprovementToday}% {if $salesImprovementToday > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h3>{l s='Sales this week' mod='bpm_salesinfo'}</h3>
            <p>{if $salesWeek}{$salesWeek} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last week' mod='bpm_salesinfo'}: {if $salesLastWeek}{$salesLastWeek} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $salesImprovementWeek > 0}green-progress{elseif $salesImprovementWeek < 0}red-progress{/if}">
                ({$salesImprovementWeek}% {if $salesImprovementWeek > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h3>{l s='Sales this month' mod='bpm_salesinfo'}</h3>
            <p>{if $salesMonth}{$salesMonth} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last month' mod='bpm_salesinfo'}: {if $salesLastMonth}{$salesLastMonth} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $salesImprovementMonth > 0}green-progress{elseif $salesImprovementMonth < 0}red-progress{/if}">
                ({$salesImprovementMonth}% {if $salesImprovementMonth > 0}↑{else}↓{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h3>{l s='Sales this year' mod='bpm_salesinfo'}</h3>
            <p>{if $salesYear}{$salesYear} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last year' mod='bpm_salesinfo'}: {if $salesLastYear}{$salesLastYear} €{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $salesImprovementYear > 0}green-progress{elseif $salesImprovementYear < 0}red-progress{/if}">
                ({$salesImprovementYear}% {if $salesImprovementYear > 0}↑{else}↓{/if})
            </div>
        </div>
    </div>
   
    <div class="sales-info-header">
        <h2>{l s='Abandoned Carts' mod='bpm_salesinfo'}</h2>
    </div>

    <div class="sales-info-container">
        <div class="sales-info-box">
            <h3>{l s='Abandoned carts today' mod='bpm_salesinfo'}</h3>
            <p>{if $abandonedCartsToday}{$abandonedCartsToday}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Yesterday' mod='bpm_salesinfo'}: {if $abandonedCartsYesterday}{$abandonedCartsYesterday}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $abandonedCartsImprovementToday > 0}green-progress{elseif $abandonedCartsImprovementToday < 0}red-progress{/if}">
                ({$abandonedCartsImprovementToday}% {if $abandonedCartsImprovementToday > 0}↓{else}↑{/if})
            </div>
        </div>

        <div class="sales-info-box">
            <h3>{l s='Abandoned carts this week' mod='bpm_salesinfo'}</h3>
            <p>{if $abandonedCartsWeek}{$abandonedCartsWeek}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last week' mod='bpm_salesinfo'}: {if $abandonedCartsLastWeek}{$abandonedCartsLastWeek}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $abandonedCartsImprovementWeek > 0}green-progress{elseif $abandonedCartsImprovementWeek < 0}red-progress{/if}">
                ({$abandonedCartsImprovementWeek}% {if $abandonedCartsImprovementWeek > 0}↓{else}↑{/if})
            </div>
        </div>

        <div class="sales-info-box">
            <h3>{l s='Abandoned carts this month' mod='bpm_salesinfo'}</h3>
            <p>{if $abandonedCartsMonth}{$abandonedCartsMonth}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last month' mod='bpm_salesinfo'}: {if $abandonedCartsLastMonth}{$abandonedCartsLastMonth}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $abandonedCartsImprovementMonth > 0}green-progress{elseif $abandonedCartsImprovementMonth < 0}red-progress{/if}">
                ({$abandonedCartsImprovementMonth}% {if $abandonedCartsImprovementMonth > 0}↓{else}↑{/if})
            </div>
        </div>
        
        <div class="sales-info-box">
            <h3>{l s='Carts abandoned this year' mod='bpm_salesinfo'}</h3>
            <p>{if $abandonedCartsYear}{$abandonedCartsYear}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <p class="previous-period-text">{l s='Last year' mod='bpm_salesinfo'}: {if $abandonedCartsLastYear}{$abandonedCartsLastYear}{else}{l s='No data yet' mod='bpm_salesinfo'}{/if}</p>
            <div class="change-percentage {if $abandonedCartsImprovementYear > 0}green-progress{elseif $abandonedCartsImprovementYear < 0}red-progress{/if}">
                ({$abandonedCartsImprovementYear}% {if $abandonedCartsImprovementYear > 0}↓{else}↑{/if})
            </div>
        </div>
    </div>
</div>
