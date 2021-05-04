{{ $i = 0 }}
@while ($i < 10)
    <h2>{{ $i }}</h2>
    {{ $i++ }}
@endwhile
 
@forelse ($names as $name)
    <h2>The name is {{ $name }}</h2>
@empty
    <h2>There are no names</h2>
@endforelse

@foreach ($names as $name)
    <h2>The name is {{ $name }}</h2>
@endforeach

@for ($i = 0; $i <= 10; $i++)
    <h2>The number is {{ $i }}</h2>
@endfor

@switch($name)
    @case('Dary')
        <h2>Name is Dary</h2>
        @break
    @case('John')
        <h2>Name is John</h2>
        @break
    @case('Michael')
        <h2>Name is Michael</h2>
        @break
    @default
        <h2>No match found!</h2> 
@endswitch


@if (5 > 10)
    <p>5 is greather than 10</p>
@elseif(5 == 10)
    <p>5 is indeed lower than 10</p>
@else
    <p>all are wrong</p>
@endif

@unless (empty($name))
    <h2>Name isn't ampty</h2>
@endunless

@empty($namee)
    <h2>Name is ampty</h2>
@endempty

@isset($name)
    <h2>Name has been set</h2>
@endisset
