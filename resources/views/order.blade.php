@extends('layouts.app')
@section('content')


<form action="/save_order" method="POST">
    @csrf
  
    <table class="table table-striped table-bordered">
            <thead>
                <th></th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Tax</th>
                <th>Quantity</th>
            </thead>
            <tbody>
                @foreach ($menu_lists as $element)
                    <tr>

                        <td class="text-center"><input type="checkbox" value="{{$element->id}}" name="menulistid[]" style=""></td>
                        <td>{{$element->MenuCategory->name}}</td>
                        <td>{{$element->name}}</td>
                        <td>{{$element->price}}</td>
                        <td>{{$element->tax}}</td>
                        <td><input type="number" class="form-control" name="quantity{{$element->id}}"></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        
        <div class="row">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            </div>
        </div>
</form>
{{-- @foreach ($categories as $element)
    <h1>{{$element->name}}</h1>
    @foreach ($element->MenuList as $list)
        <h4>{{$list->price}}</h4>
        <p>{{$list->tax}}</p>
    @endforeach
@endforeach


@foreach ($menu_lists as $element)
    <h1>{{$element->name}}</h1>
    <p>{{$element->MenuCategory->name}}</p>
@endforeach --}}

@endsection