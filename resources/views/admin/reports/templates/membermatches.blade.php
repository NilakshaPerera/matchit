<?php 
/**
 * Updated By : Nilaksha 
 * Updated At : 7/3/2021
 * Summary : Loads the match details per client passed from the back-end
 * */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped jstable">

                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Match Name</th>
                            <th>Email</th>

                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>

                            <th>Prefered Gender</th>
                            <th>Region</th>
                            <th>Personality</th>

                            <th>Hobby</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $member)
                            @foreach($member['matches']['data'] as $match)     
                            <tr>

                                <td>{{ $member['name'] }}</td>
                                <td>{{ $match['name'] }}</td>
                                <td>{{ $match['email'] }}</td>

                                <td>{{ $match['phone'] }}</td>
                                <td>{{ $match['gender'] }}</td>
                                <td>{{ $match['dob'] }}</td>

                                <td>{{ $match['prefered_gender'] }}</td>
                                <td>{{ $match['region'] }}</td>
                                <td>{{ implode(", ",  $match['personality']) }}</td>

                                <td>{{ implode(", ",  $match['hobby']) }}</td>
                                <td>{{ round( $match['total_score'] , 1) }}%</td>
                            </tr>

                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>