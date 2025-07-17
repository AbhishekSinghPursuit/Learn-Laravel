<div class="form-group">
    <label for="{{$name}}">{{$label}} - {{$demo}}</label>
    <input value="{{old('name')}}" type="{{$type}}" name="{{$name}}" class="form-control" id="" aria-describedby="textHelp" placeholder="{{$placeholder}}">
    <span class="text-danger">
        @error($name)
            {{$message}}
        @enderror
    </span>
</div>