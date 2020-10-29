<form action="{!! $url ?? url('') !!}" method="POST">
    @method('DELETE')
    @csrf
    <button type='submit' class="{{ $class ?? 'btn btn-danger' }}" value="{{ $value ?? 'delete' }}"><i class="fa fa-trash"></i>{!! $text ?? '' !!}</button>
</form>