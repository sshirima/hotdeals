<table class="table table-responsive" id="categories-table">
    <thead>
    <tr>
        <th>Name</th>
        <th class="pull-right" colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subcategories as $subcategory)
        <tr>
            <td>{!! $subcategory->subcat_name !!}</td>
            <td class="pull-right">
                {!! Form::open(['route' => ['subcategories.destroy', $subcategory->subcat_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subcategories.show', [$subcategory->subcat_id]) !!}"
                       class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subcategories.edit', [$subcategory->subcat_id]) !!}"
                       class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>