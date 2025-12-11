@if($logoClass == 'logo-dark')
<img class="logo-img logo-dark" src='{{ $logoUrl }}' srcset='{{ $logoUrl }}' alt="{{getAppName()}}-logo-dark" {{$params}}>
@elseif($logoClass == 'logo-light')
    <img class="logo-light logo-img" src="{{ $logoUrl }}" srcset="{{ $logoUrl }}" alt="{{getAppName()}}-logo-light" {{$params}}>
@elseif($logoClass == 'logo-small')
    <img class="logo-img logo-small logo-img-small" src="{{ $logoUrl }}" srcset="{{ $logoUrl }}" alt="{{getAppName()}}-logo-small" {{$params}}>
@elseif($logoClass == 'logo-img')
    <img class="logo-img" src="{{ $logoUrl }}" alt="{{getAppName()}}-logo" height="35px" {{$params}}>
@else
    <img class="{{$logoClass}}" src="{{ $logoUrl }}" alt="{{getAppName()}}-logo" {{$params}}>
@endif
