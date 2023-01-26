@if(Session::has('message'))
    <div class="alert alert-info">
        <script>alert("{{ Session::get('message') }}")</script>
        <?php session()->forget('message'); ?>
    </div>
@endif
<a href="{{ route('manage-bulletin.add') }}">Add</a>

<form action="{{ route('manage-bulletin.search') }}" method="GET">
    <input type="search" name="search">
    <button type="submit">Search</button>
</form>
<table >
    <thead>
    <tr>
        <th >
            #
        </th>
        <th >
            Category
        </th>
        <th>
            Title 
        </th>
        <th >
            Posted by
        </th>
        <th>
            Date
        </th>
        <th>
            Action
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($bulletins as $bulletin)
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $bulletin->category }}</td>
            <td >{{ $bulletin->title }}</td>
            <td >{{ $bulletin->posted_by }}</td>
            <td >{{ $bulletin->created_at->toDateString() }}</td>
            <td >
                <a href="{{ route('manage-bulletin.view', $bulletin->bulletin_id) }}">
                    <i class></i>
                    <button>View</button>
                </a>
                <a href="{{ route('manage-bulletin.edit', $bulletin->bulletin_id) }}">
                    <i class></i>
                    <button>Edit</button>
                </a>
                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('manage-bulletin.delete', $bulletin->bulletin_id) }}">
                    <i class></i>
                    <button>Delete</button>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>