<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Profile - Example Recycling Facility</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("background.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            margin-top: 50px;
            position: relative;
        }

        /* Add your CSS styling here */
        h1, h2, p {
            color: #f3eeee;
        }

        .facility-profile {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .facility-info {
            font-size: 1.2em;
            color: #f3eeee;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            margin: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>REVIBE</h1>
    <div class="container">
        <h2>Example Recycling Facility</h2>
        <div class="facility-profile" id="facilityProfile">
            <!-- Facility profile will be dynamically added here -->
        </div>
        
        <div class="button-container">
            <a href="search.html"><button>Back</button></a>
            <a href="recycle.html"><button>Next</button></a>
        </div>
    </div>

    <script>
        const facilityData = [{"City":"Coimbatore","centre_names":"Tharani Electronics Waste","address":"No: 1A, Lala Mahal Road, PM Samy Colony, Gandhipuram, Tamil Nadu 641027","contact_person":"NIL","phone":"091714 50039","weekday_time":"9AM-8PM","weekend_time":"10AM-2PM","electronics":"yes","batteries":"yes","circuitboards":"yes"},{"City":"Coimbatore ","centre_names":"Green Era Recyclers","address":"No 37, Sivanandha Industrial Complex, Dr. MS Udayamurthy Nagar, Thadagam Main Rd, Edayarpalayam, Coimbatore, Tamil Nadu 641025","contact_person":"NIL","phone":"083002 23526","weekday_time":"9AM-6PM","weekend_time":"11AM-3PM","electronics":"yes","batteries":"yes","circuitboards":"no"},{"City":"Coimbatore","centre_names":"Waste care","address":"4, 119B, Richard St W, NGGO Colony, Coimbatore, Kurudampalayam, Tamil Nadu 641022","contact_person":"NIL","phone":"8754775848","weekday_time":"12AM-11:59PM","weekend_time":"12AM-11:59PM","electronics":"yes","batteries":"yes","circuitboards":"yes"},{"City":"Coimbatore","centre_names":"Techazar E-cyclers","address":" No 15, mother india industrial estate, Seerapalayam Link Rd, Malumichampatti, Tamil Nadu 641050","contact_person":"NIL","phone":"9840235929","weekday_time":"7AM-7PM","weekend_time":"7AM-7PM","electronics":"yes","batteries":"no","circuitboards":"no"},{"City":"Coimbatore","centre_names":"Green India Recyclers","address":"S.F.NO.26\/1B, KOVILPALAYAM ROAD, SULAKKAL VILLAGE, KINATHUKADAVU TALUK, COIMBATORE- 642 110. TAMILNADU, INDIA","contact_person":"NIL","phone":"9003491034","weekday_time":"NIL","weekend_time":"NIL","electronics":"yes","batteries":"no","circuitboards":"yes"},{"City":"Coimbatore","centre_names":"Greenbhoomi","address":"117 10th Street Gandhipuram Road, Coimbatore, Tamil Nadu 641012","contact_person":"NIL","phone":"9566213130","weekday_time":"10AM-6PM","weekend_time":"10AM-6PM","electronics":"yes","batteries":"yes","circuitboards":"yes"},{"City":"Coimbatore","centre_names":"Elex Battery House","address":"2, Patel Road, Near Sri Ganapathy Temple, Ram Nagar, Coimbatore, Tamil Nadu 641009","contact_person":"NIL","phone":"9043439486","weekday_time":"10AM-9:30PM","weekend_time":"10AM-9:30PM","electronics":"no","batteries":"yes","circuitboards":"no"}];

        const facilityProfile = document.getElementById('facilityProfile');
        const facilityInfo = document.createElement('div');
        facilityInfo.classList.add('facility-info');

        facilityData.forEach(facility => {
            const address = facility.address;
            const contact = facility.contact_person;
            const phone = facility.phone;
            const materials = [];
            if (facility.electronics === 'yes') materials.push('Electronics');
            if (facility.batteries === 'yes') materials.push('Batteries');
            if (facility.circuitboards === 'yes') materials.push('Circuit Boards');
            const weekdayTime = facility.weekday_time;
            const weekendTime = facility.weekend_time;

            facilityInfo.innerHTML += `
                <p><strong>Address:</strong> ${address}</p>
                <p><strong>Contact:</strong> ${contact}</p>
                <p><strong>Phone:</strong> ${phone}</p>
                <p><strong>Accepted Materials:</strong> ${materials.join(', ')}</p>
                <p><strong>Operational Hours:</strong> Weekdays: ${weekdayTime}, Weekends: ${weekendTime}</p>
                <hr>
            `;
        });

        facilityProfile.appendChild(facilityInfo);
    </script>
</body>
</html>
