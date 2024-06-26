<x-layout title="Nova Série">
    <form action="{{route('series.store')}}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" 
                        id="nome" 
                        name="nome" 
                        class="form-control"
                        value="{{ old('nome') }}"
                        autofocus>
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº Temporadas:</label>
                <input type="text" 
                        id="seasonsQty" 
                        name="seasonsQty" 
                        class="form-control"
                        value="{{ old('seasonsQty') }}">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada</label>
                <input type="text" 
                        id="episodesPerSeason" 
                        name="episodesPerSeason" 
                        class="form-control"
                        value="{{ old('episodesPerSeason') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
