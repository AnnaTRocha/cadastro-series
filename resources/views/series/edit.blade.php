<x-layout title="Editar a Série '{!!$series->nome!!}'">
    <form action="{{route('series.update', $series)}}" method="post">
        @csrf
        @method('PUT')

        @if ($errors->any()) 
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$erro}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" 
                    id="nome" 
                    name="nome" 
                    class="form-control"
                    value="{{$series->nome}}">
        </div>
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>
</x-layout>