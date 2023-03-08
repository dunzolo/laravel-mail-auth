{{-- questo è il contenuto del messaggio che invierò tramite email --}}
<h1>Nuovo post inserito</h1>

<p>
    Nuovo post inserito<br/>
    Titolo: {{ $lead->title }}<br/>
    Slug: {{ $lead->slug }}<br/>
    Contenuto: {{ $lead->content }}<br/>
</p>