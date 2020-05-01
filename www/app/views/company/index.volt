

<table>
    <tr>
        <td class="company-left-tool-table">Seřadit:</td> 
        <td>{{ orderMenu }}</td>
    </tr>
    <tr>
        <td class="company-left-tool-table">Počet řádků na stránku:</td>
        <td>{{ linesMenu }}</td>
    </tr>
    <tr>
        <td class="company-left-tool-table">Stránky:</td>
        <td>{{ pageMenu }}</td>
    </tr>
</table>

{% if (list is empty) %}
    <p>Nebyly nalezeny žádné výsledky k zobrazení</p>
{% else %}
    {% for company in list %}
    <a href="/company/show/{{ company['id'] }}" class="company-list-card">{{ company["short_name"] }}</a><br>
    {% endfor %}
{% endif %}


