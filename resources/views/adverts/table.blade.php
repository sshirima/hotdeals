<table class="table table-responsive" id="adverts-table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Expiredate</th>
        <th>Approved</th>
        <th>Approveddate</th>
        <th>Seller Id</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($adverts as $advert)
        <tr>
            <td>{!! $advert->title !!}</td>
            <td>{!! $advert->description !!}</td>
            <td>{!! $advert->expiredate !!}</td>
            <td>{!! $advert->approved !!}</td>
            <td>{!! $advert->approveddate !!}</td>
            <td>{!! $advert->seller_id !!}</td>
            <td>
                {!! Form::open(['route' => ['adverts.destroy', $advert->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('adverts.show', [$advert->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('adverts.edit', [$advert->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>