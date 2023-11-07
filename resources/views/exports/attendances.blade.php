<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>In Person</th>
            <th>Feeding</th>
            <th>Accommodation</th>
            <th>Transportation</th>
            <th>Registration Date</th>
            <th>Checked In</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attendances as $attendance)
        <tr>
            <td>{{ $attendance?->user?->name }}</td>
            <td>{{ $attendance->in_person ? 'Yes' : 'No'}}</td>
            <td>{{ $attendance->requires_feeding ? 'Yes' : 'No'}}</td>
            <td>{{ $attendance->requires_accommodation ? 'Yes' : 'No'}}</td>
            <td>{{ $attendance->requires_transport ? 'Yes' : 'No'}}</td>
            <td>{{ $attendance->registration_date}}</td>
            <td>{{ $attendance->checked_in ? 'Yes' : 'No'}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
