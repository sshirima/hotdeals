<table class="table table-responsive" id="users-table">
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Date created</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($admins as $adm)
        <tr>
            <td>{!! $adm->first_name !!}</td>
            <td>{!! $adm->last_name !!}</td>
            <td>{!! $adm->email !!}</td>
            <td>{!! $adm->created_at !!}</td>
            <td>

                <div class='btn-group'>
                    <a href="{!! route('admin.delete.confirm', [$adm->id]) !!}" class='btn btn-default btn-xs'><i
                                class="fa fa-trash"></i></a>
                </div>

            </td>
        </tr>
        </tr>
    @endforeach
    </tbody>
</table>