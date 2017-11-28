<table class="table table-responsive" id="products-table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Brand</th>
        <th>Manufacturer</th>
        <th>Model</th>
        <th>P Cost</th>
        <th>C Cost</th>
        <th>Advert Id</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->brand !!}</td>
            <td>{!! $product->manufacturer !!}</td>
            <td>{!! $product->model !!}</td>
            <td>{!! $product->p_cost !!}</td>
            <td>{!! $product->c_cost !!}</td>
            <td>{!! $product->advert_id !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>