<table>
    <thead>
    <tr>
        <th>#</th>
        <th>نام کاربری</th>
        <th>فعال</th>
        <th>نقش در سیستم</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->active }}</td>
            <td>
                @if(!is_null($user->role_id))
                    {{ $user->role->title }}
                @else
                    تعریف نشده
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
