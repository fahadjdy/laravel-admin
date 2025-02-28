

<table>
                <tr>
                    <td>
                        <p><u>INVOICE</u></p>
                        <h1><?=$header['name']?></h1>
                        <p>{{ $header['address_1'] }}</p>
                        <span> {{ $header['contact_1'] }} | {{ $header['email_1'] }}</span>
                    </td>
                    <td>
                        <img src="{{asset($header['logo'])}}" alt="<?=$header['name']?>" height="150px">
                    </td>
                </tr>
            </table>