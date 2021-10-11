<table>
    <thead>
    <tr>
        <th style="width:10px ;font-weight: bold;">کد پروژه</th>
        <th style="width:25px ;font-weight: bold;">نام پروژه</th>
        <th style="width: 20px;font-weight: bold;">تاریخ شروع پروژه</th>
        <th style="width: 20px;font-weight: bold;">تاریخ پایان پروژه</th>
        <th style="width: 80px;font-weight: bold;">توضیحات</th>
    </tr>
    </thead>
    <tbody>


    @foreach($projects as $project)
        <tr>
            <td style="height: 60px;vertical-align:top;word-wrap: break-word;">{{ $project->id}}</td>
            <td style="height: 60px;vertical-align:top;word-wrap: break-word;">{{ $project->name }}</td>
            <td style="height: 60px;vertical-align:top;word-wrap: break-word;">{{ $project->start_date_project }}</td>
            <td style="height: 60px;vertical-align:top;word-wrap: break-word;">{{ $project->end_date_project }}</td>
            <td style="height: 60px;vertical-align:top;word-wrap: break-word;">{{ $project->description }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
