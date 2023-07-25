<table class="table">
    <thead>
    <tr>
        <th></th>
        <th>Nome</th>
        <th>Email</th>
        <th>Data criação</th>
        <th>Data Atualização </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->nome }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->created_at }}</td>
            <td>{{ $customer->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>