

{% if (companyName is empty) %}
    <p>Nebyly nalezeny žádné výsledky k zobrazení</p>
{% else %}
    <h1>{{ companyName[0]["name"] }}</h1>
{% endif %}

<a href="/company">Zpět</a>