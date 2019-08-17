@foreach($mainParts as $part)
<div class="suggest item1 partDetails" data-id="{{$part->id}}">

    <a data-toggle="modal" data-target="#details" data-id="{{$part->id}}" data-dismiss='modal' class="to-dtls">
        <img src="{{getimg($part->image)}}" class="sgsting">
        <h4 class="">{{$part->name()}}</h4>
    </a>
</div>
@endforeach
