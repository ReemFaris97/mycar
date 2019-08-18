
@forelse($part->children as $child)
<li>
    <ul class="inDetails">
        <li>
            <a class="piece-sm" data-fancybox="Gallery" data-caption="{{$child->name()}}" href="{{getimg($child->image)}}">
                <img src="{{getimg($child->image)}}">
            </a>
        </li>
        <li>
            <span class="code-p">{{$child->code}}</span>
        </li>

        <li>
            <label class="new-p">
                <span class="name-p" data-partid="{{$child->id}}">{{$child->name()}}</span>
                <input name="part_id" value="{{$child->id}}" type="checkbox" class="if-check">
                <span class="checkmark"></span>
            </label>
        </li>
    </ul>
</li>
@empty

    <li>
        <ul class="inDetails">
            <li>
                <a class="piece-sm" data-fancybox="Gallery" data-caption="{{$part->name()}}" href="{{getimg($part->image)}}">
                    <img src="{{getimg($part->image)}}">
                </a>
            </li>
            <li>
                <span class="code-p"></span>
            </li>

            <li>
                <label class="new-p">
                    <span class="name-p" data-partid="{{$part->id}}">{{$part->name()}}</span>
                    <input name="part_id" value="{{$part->id}}" type="checkbox" class="if-check">
                    <span class="checkmark"></span>
                </label>
            </li>
        </ul>
    </li>

@endforelse
