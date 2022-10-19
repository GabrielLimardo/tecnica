<div class="row">
    <div class="col-md-6 mb-1 form-floating">
        <input type="text" name="strDrink" id="strDrink" class="col form-control" placeholder="strDrink" value="{{old('strDrink', $data->strDrink ?? '')}}" required />
        <label>strDrink</label>
    </div>

    <div class="col-md-6 mb-1 form-floating">
        <input type="text" name="strDrinkThumb" id="strDrinkThumb" class="col form-control" placeholder="strDrinkThumb" value="{{old('strDrinkThumb', $data->strDrinkThumb ?? '')}}" required />
        <label>strDrinkThumb</label>
    </div>

    <div class="col-md-6 mb-1 form-floating">
        <input type="text" name="idDrink" id="idDrink" class="col form-control" placeholder="idDrink" value="{{old('idDrink', $data->idDrink ?? '')}}" required />
        <label>idDrink</label>
    </div>

    <div class="col-md-6 mb-1 form-floating">
        <input type="text" name="stars" id="stars" class="col form-control" placeholder="stars" value="{{old('stars', $data->stars ?? '')}}" required />
        <label>stars</label>
    </div>

    <div class="col-md-6 mb-1 form-floating">
        <input type="text" name="note" id="note" class="col form-control" placeholder="note" value="{{old('note', $data->note ?? '')}}" required />
        <label>note</label>
    </div>

    <div class="col-md-6 mb-1 form-floating">
        <input type="text" name="difficult" id="difficult" class="col form-control" placeholder="difficult" value="{{old('difficult', $data->difficult ?? '')}}" required />
        <label>difficult</label>
    </div>


</div>
