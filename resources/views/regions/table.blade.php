<table class="table table-responsive" id="regions-table">
    <thead>
    <tr>
        <th>Name</th>
        <th class="pull-right" colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($regions as $region)
        <tr>
            <td>{!! $region->name !!}</td>
            <td class="pull-right">
                {!! Form::open(['route' => ['regions.destroy', $region->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('regions.show', [$region->id]) !!}" class='btn btn-default btn-xs'><i
                                class="fa fa-eye"></i></a>
                    <a href="{!! route('regions.edit', [$region->id]) !!}" class='btn btn-default btn-xs'><i
                                class="fa fa-pencil-square-o"></i></a>
                    {!! Form::button('<i class="fa fa-trash" ></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>