<h2>Ciao Admin!</h2>
<h4>C'è posta per te!</h4>
<p>
    Hai ricevuto un nuovo messaggio da: <br>
    Nome: {{ $lead->name }}<br>
    Email: {{ $lead->email }}<br>
    Messaggio:
<p>{{ $lead->message }}</p>
</p>
