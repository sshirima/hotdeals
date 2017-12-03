<table class="table table-responsive" id="users-table">
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Phone number</th>
        <th>Email</th>
        <th>Date created</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sellers as $seller)
        <tr>
            <td>{!! $seller->first_name !!}</td>
            <td>{!! $seller->last_name !!}</td>
            <td>{!! $seller->phonenumber !!}</td>
            <td>{!! $seller->email !!}</td>
            <td>{!! $seller->created_at !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>