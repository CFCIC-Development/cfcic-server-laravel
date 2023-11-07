<table>
    <thead>
    <tr>
        <th>parent_name</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>emergency_contact</th>
        <th>allergies</th>
    </tr>
    </thead>
    <tbody>
    @foreach($attendances as $attendance)
        <tr>
            <td>{{ $attendance['parent_name'] }}</td>
            <td>{{ $attendance['first_name'] }}</td>
            <td>{{ $attendance['last_name'] }}</td>
            <td>{{ $attendance['emergency_contact'] }}</td>
            <td>
                @foreach ($attendance['allergies']  as $allergies)
                    {{ $allergies }},
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
