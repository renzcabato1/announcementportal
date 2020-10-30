
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="{{ asset('/images/icon.png')}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        table { 
            border-spacing: 0;
            border-collapse: collapse;
        }
        
        body{
            font-family: "Arial", Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <table border='1' width='100%'>
        <tr align='center'>
            <td colspan = 5>
                Event: {{$event_title->title}}
            </td>
        </tr>
        <tr align='center' style='font-size: 12px;'>
            <td>
                ID
            </td>
            <td>
                Name
            </td>
            <td>
                Company
            </td>
            <td>
                Department
            </td>
            <td>
                Location
            </td>
        </tr>
        @foreach($event_joiner as $key => $event)
        
        <tr style='font-size: 10px;'>
            <td>
                {{$key+1}}
            </td>
            <td>
                {{$event->first_name.' '.$event->last_name}}
            </td>
            <td>
                {{$event->company_name}}
            </td>
            <td>
                {{$event->department_name}}
            </td>
            <td>
                {{$event->location_name}}
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>