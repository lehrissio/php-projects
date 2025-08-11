<?php
// Workshop Attendance Coordination (Part 1)
// Background Scenario:
// You're in charge of managing the attendance for an upcoming workshop. The interest in your workshop has exceeded capacity, leading to a challenging yet essential task: organizing the attendee list effectively. You're provided with two arrays containing the names of those interested and those requesting removals. Your goal is to streamline the attendance process, ensuring fairness and priority where due. 💼🎟️

// Data Provided:
// $waitingList (array): a list of individuals who have expressed interest in attending your workshop. It includes names that may appear more than once, indicating multiple expressions of interest or accidental duplications
// Example: ['Dawn White', 'Frank Smith', 'Bob Carter', 'Charlie Davis', 'Eve Black', 'Alice Brown', 'Alice Brown', 'Charlie Davis', 'Grace Jones', 'Hank Green', 'Eve Black', 'Dawn White']
// $removeFromList (array): This array contains the names of individuals who have requested to be removed from the waiting list, either because they can no longer attend the workshop or for other reasons. These names should be excluded from the final attendee list
// Example: ['Dawn White', 'Charlie Davis']
// Note: The above arrays are illustrative, showcasing the data structure and variety you'll encounter. Your code will be tested with diverse datasets to assess its adaptability and robustness across different scenarios.

// Tasks:
// List Cleaning: First, remove any duplicates and the names found in $removeFromList from the $waitingList.  Create a new array named $cleanedWaitingList that holds the refined list of potential attendees. This step ensures you're working with a clean, accurate list of potential participants.
// Initial Selection: Next, sort the cleaned list alphabetically and select the first five individuals as attendees for the workshop. Store these selected names in an array called $selectedParticipants.
// Attendance Status: Finally, generate an unordered HTML list showcasing the final list of potential participants after the cleaning process. For each person, add a '✅' if they have been selected for the workshop or a '❌' if they have not. Do not include individuals from the $removeFromList in the final output; only display the status of those who remain on the waiting list after the cleaning process.
// Expected Output: Ensure your script generates an output akin to the following example:

// <ul>
//     <li>Alice Brown ✅</li>
//     <li>Bob Carter ✅</li>
//     <li>Eve Black ✅</li>
//     <li>Frank Smith ✅</li>
//     <li>Grace Jones ✅</li>
//     <li>Hank Green ❌</li>
// </ul>
// Precise spacing between HTML tags isn't necessary: <ul>       <li>Alice Brown ✅</li>             </ul> will be treated as <ul><li>Alice Brown ✅</li></ul>
// However, ensure the list elements' content exactly matches the expected output!
// Remember, your script should dynamically handle variations in the provided lists, ensuring accuracy in real-world scenarios where data alterations are a norm.
// The arrays $waitingList and $removeFromList are predefined for your use in the background
// But you have to create the arrays $cleanedWaitingList and $selectedParticipants on your own

$cleanedWaitingList = array_unique($waitingList);

$cleanedWaitingList = array_diff($cleanedWaitingList, $removeFromList);

sort($cleanedWaitingList);

$selectedParticipants = array_slice($cleanedWaitingList, 0, 5);

echo "<ul>";
foreach ($cleanedWaitingList as $name) {
    $status = in_array($name, $selectedParticipants) ? "✅" : "❌";
    echo "<li>{$name} {$status}</li>";
}
echo "</ul>";

// Workshop Attendance Coordination (Part 2)
// Continuation of the previous Scenario:
// With the workshop's attendance list now streamlined and organized, it's time to delve deeper into ensuring the most eager and deserving participants secure their spots. We proceed from where Part 1 left off, with a cleaned and sorted list of potential attendees. Now, we introduce the concept of priority handling and backup candidates to further refine the selection process. ⚖️🔜

// Data Provided:
// $waitingList: A cleaned-up and sorted array containing the names of people who have signed up for the workshop. Example:

// $waitingList = [
//     'Alex Reed',
//     'Blake Jordan',
//     'Casey Smith',
//     'Drew Alex',
//     'Elliot Ford',
//     'Finley Harper',
//     'Jordan Kay',
//     'Kim Lee',
//     'Liam Park',
//     'Morgan Drew'
// ];

// $priorityParticipants: A sorted array with names of participants who should be given priority for workshop attendance, even if they are not part of the $waitingList!

// Example:
// $priorityParticipants = [
//     'Jordan Kay', // In the waiting list and has priority
//     'Sam Taylor', // Not in the waiting list but has priority
//     'Zane Pryor'  // Not in the waiting list but has priority
// ];

// $individualName: just a string like 'Alex Reed'

// Tasks:
// Priority Inclusion and Selection: Construct $finalAttendees, a sorted array with no duplicates, consisting of up to 5 names. Start by including $priorityParticipants, then fill remaining slots with individuals from $waitingList until you reach five.

// Caution:
// Be aware that a name might appear in both $priorityParticipants and $waitingList!
// It is also possible that there are more than 5 people in $priorityParticipants. In such cases, only the top 5 from them should be selected
// Backup Candidates Identification: After finalizing $finalAttendees, select the next three names as $backupCandidates. These individuals will serve as backup choices should any of the final attendees be unable to participate. Ensure these backups are distinct from the $finalAttendees and free from duplications within the backup list itself. Backup candidates could also include $priorityParticipants who are not in the $finalAttendees array (in cases where there are more than 5 $priorityParticipants)
// Generate and display personalized messages acknowledging their status as a backup for the workshop. Examples:

// "Hey Casey Smith, we want to inform you that you are one of our backup candidates. 🥳"
// "Hey Drew Alex, we want to inform you that you are one of our backup candidates. 🥳"
// "Hey Elliot Ford, we want to inform you that you are one of our backup candidates. 🥳"

// Ensure to dynamically replace the names with the actual names of the backup candidates, keeping the message format consistent without altering any additional characters or whitespace.
// Individual Status Inquiry: Assess the status of a specific individual with respect to their workshop attendance. The predefined variable $individualName will be used to identify this person. Your task is to determine in which group this individual falls: are they one of the $finalAttendees, a $backupCandidate, or are they still on the waiting list? Store this individual's status in a new variable, $individualStatus.
// For those who remain on the waiting list, further detail their position within the subset of individuals not chosen as final attendees or backup candidates. This information offers valuable insight into where they stand relative to other potential participants.

// If $individualName is 'Alex Reed', then $individualStatus should be 'Final Attendee'.
// If $individualName is 'Elliot Ford', then $individualStatus should be 'Backup Candidate'.
// If $individualName is 'Kim Lee', then $individualStatus should be 'Waiting, position 3'.

// This is based on the remaining waiting list, where ['Finley Harper', 'Jordan Kay', 'Kim Lee', 'Liam Park', 'Morgan Drew'] represents those yet to be selected.

// If the individual is not present in any list, set $individualStatus to 'Not found'.

$backupCandidates = [];

$waitingList = array_diff($waitingList, $priorityParticipants);

if (count($priorityParticipants) >= 5) {

    $finalAttendees = array_slice($priorityParticipants, 0, 5);

    array_splice($priorityParticipants, 0, 5); //remove

} else {

    $finalAttendees = $priorityParticipants;
    $empty = 5 - count($finalAttendees);

    array_splice($priorityParticipants, 0); //remove todos

    $finalAttendees = array_merge($finalAttendees, array_slice($waitingList, 0, $empty));

    array_splice($waitingList, 0, $empty); //remove

}

sort($finalAttendees);

if (empty($priorityParticipants)) {
    $backupCandidates = array_slice($waitingList, 0, 3);

    array_splice($waitingList, 0, 3); //remove  

} else if (count($priorityParticipants) >= 3){

    $backupCandidates = array_slice($priorityParticipants, 0, 3);

    array_splice($priorityParticipants, 0, 3); //remove

} else if (count($priorityParticipants) > 0) {

    $backupCandidates = $priorityParticipants;
    $empty = 3 - count($priorityParticipants);

    array_splice($priorityParticipants, 0); //remove

    if (count($waitingList) >= $empty) {
        $backupCandidates = array_merge($backupCandidates, array_slice($waitingList, 0, $empty));

        array_splice($waitingList, 0, $empty); //remove

    } else {
        $backupCandidates = array_merge($backupCandidates, $waitingList);

        array_splice($waitingList, 0); //remove
    }
    
}

foreach ($backupCandidates AS $name) {
    echo "Hey {$name}, we want to inform you that you are one of our backup candidates. 🥳\n";
}

if (in_array($individualName, $finalAttendees)) {
    $individualStatus = 'Final Attendee';
} else if (in_array($individualName, $backupCandidates)){
    $individualStatus = 'Backup Candidate';
} else if (in_array($individualName, $waitingList)) {
    $key = array_search($individualName, $waitingList) + 1;
    $individualStatus = "Waiting, position {$key}";
} else if (in_array($individualName, $priorityParticipants)) {
    $key = array_search($individualName, $priorityParticipants) + 1;
    $individualStatus = "Waiting, position {$key}";
} else {
    $individualStatus = 'Not found';
}

?>
