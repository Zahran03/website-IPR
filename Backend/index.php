<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Base styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
        }
        
        .container {
            width: 95%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid #e1e5eb;
        }
        
        .header h1 {
            margin: 0;
            color: #3c4858;
            font-weight: 600;
        }
        
        /* Table styles */
        .table-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #f8f9fa;
        }
        
        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e1e5eb;
        }
        
        th {
            font-weight: 600;
            color: #3c4858;
        }
        
        tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        /* Button styles */
        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
        }
        
        .btn-primary {
            background-color: #3498db;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
        }
        
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            position: relative;
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            border-bottom: 1px solid #e1e5eb;
        }
        
        .modal-header h2 {
            margin: 0;
            font-size: 1.25rem;
            color: #3c4858;
        }
        
        .close {
            font-size: 24px;
            cursor: pointer;
            color: #8898aa;
        }
        
        .close:hover {
            color: #3c4858;
        }
        
        .modal-body {
            padding: 24px;
        }
        
        .user-detail {
            margin-bottom: 12px;
        }
        
        .user-detail strong {
            min-width: 130px;
            display: inline-block;
            color: #3c4858;
        }
        
        .status {
            padding: 4px 8px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #e3fcef;
            color: #0b7a48;
        }
        
        .status-inactive {
            background-color: #fee9e7;
            color: #ae341f;
        }
        
        .status-pending {
            background-color: #fff8e1;
            color: #b68d00;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>User Management Dashboard</h1>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registration Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>John Smith</td>
                        <td>john.smith@example.com</td>
                        <td>15 Feb 2025</td>
                        <td><span class="status status-active">Active</span></td>
                        <td><button class="btn btn-primary" onclick="openModal('user001')">View Details</button></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Sarah Johnson</td>
                        <td>sarah.j@example.com</td>
                        <td>12 Feb 2025</td>
                        <td><span class="status status-active">Active</span></td>
                        <td><button class="btn btn-primary" onclick="openModal('user002')">View Details</button></td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Mike Roberts</td>
                        <td>mike.roberts@example.com</td>
                        <td>10 Feb 2025</td>
                        <td><span class="status status-inactive">Inactive</span></td>
                        <td><button class="btn btn-primary" onclick="openModal('user003')">View Details</button></td>
                    </tr>
                    <tr>
                        <td>004</td>
                        <td>Emma Wilson</td>
                        <td>emma.w@example.com</td>
                        <td>08 Feb 2025</td>
                        <td><span class="status status-pending">Pending</span></td>
                        <td><button class="btn btn-primary" onclick="openModal('user004')">View Details</button></td>
                    </tr>
                    <tr>
                        <td>005</td>
                        <td>David Chen</td>
                        <td>david.chen@example.com</td>
                        <td>05 Feb 2025</td>
                        <td><span class="status status-active">Active</span></td>
                        <td><button class="btn btn-primary" onclick="openModal('user005')">View Details</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- User details modals -->
    <div id="user001" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User Details</h2>
                <span class="close" onclick="closeModal('user001')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="user-detail"><strong>ID:</strong> 001</div>
                <div class="user-detail"><strong>Name:</strong> John Smith</div>
                <div class="user-detail"><strong>Email:</strong> john.smith@example.com</div>
                <div class="user-detail"><strong>Phone:</strong> +1 (555) 123-4567</div>
                <div class="user-detail"><strong>Address:</strong> 123 Main St, Boston, MA 02108</div>
                <div class="user-detail"><strong>Registration Date:</strong> 15 February 2025, 10:34 AM</div>
                <div class="user-detail"><strong>Last Login:</strong> 27 February 2025, 09:15 AM</div>
                <div class="user-detail"><strong>Status:</strong> <span class="status status-active">Active</span></div>
                <div class="user-detail"><strong>User Type:</strong> Premium</div>
                <div class="user-detail"><strong>Notes:</strong> Frequent user, active forum contributor</div>
            </div>
        </div>
    </div>
    
    <div id="user002" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User Details</h2>
                <span class="close" onclick="closeModal('user002')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="user-detail"><strong>ID:</strong> 002</div>
                <div class="user-detail"><strong>Name:</strong> Sarah Johnson</div>
                <div class="user-detail"><strong>Email:</strong> sarah.j@example.com</div>
                <div class="user-detail"><strong>Phone:</strong> +1 (555) 234-5678</div>
                <div class="user-detail"><strong>Address:</strong> 456 Oak Ave, Seattle, WA 98101</div>
                <div class="user-detail"><strong>Registration Date:</strong> 12 February 2025, 03:22 PM</div>
                <div class="user-detail"><strong>Last Login:</strong> 26 February 2025, 11:47 AM</div>
                <div class="user-detail"><strong>Status:</strong> <span class="status status-active">Active</span></div>
                <div class="user-detail"><strong>User Type:</strong> Standard</div>
                <div class="user-detail"><strong>Notes:</strong> New customer, completed profile 100%</div>
            </div>
        </div>
    </div>
    
    <div id="user003" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User Details</h2>
                <span class="close" onclick="closeModal('user003')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="user-detail"><strong>ID:</strong> 003</div>
                <div class="user-detail"><strong>Name:</strong> Mike Roberts</div>
                <div class="user-detail"><strong>Email:</strong> mike.roberts@example.com</div>
                <div class="user-detail"><strong>Phone:</strong> +1 (555) 345-6789</div>
                <div class="user-detail"><strong>Address:</strong> 789 Pine Rd, Chicago, IL 60601</div>
                <div class="user-detail"><strong>Registration Date:</strong> 10 February 2025, 09:15 AM</div>
                <div class="user-detail"><strong>Last Login:</strong> 15 February 2025, 02:30 PM</div>
                <div class="user-detail"><strong>Status:</strong> <span class="status status-inactive">Inactive</span></div>
                <div class="user-detail"><strong>User Type:</strong> Standard</div>
                <div class="user-detail"><strong>Notes:</strong> No activity for 12 days, sent reactivation email</div>
            </div>
        </div>
    </div>
    
    <div id="user004" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User Details</h2>
                <span class="close" onclick="closeModal('user004')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="user-detail"><strong>ID:</strong> 004</div>
                <div class="user-detail"><strong>Name:</strong> Emma Wilson</div>
                <div class="user-detail"><strong>Email:</strong> emma.w@example.com</div>
                <div class="user-detail"><strong>Phone:</strong> +1 (555) 456-7890</div>
                <div class="user-detail"><strong>Address:</strong> 321 Elm Blvd, Austin, TX 78701</div>
                <div class="user-detail"><strong>Registration Date:</strong> 08 February 2025, 05:41 PM</div>
                <div class="user-detail"><strong>Last Login:</strong> Never</div>
                <div class="user-detail"><strong>Status:</strong> <span class="status status-pending">Pending</span></div>
                <div class="user-detail"><strong>User Type:</strong> Trial</div>
                <div class="user-detail"><strong>Notes:</strong> Email verification pending, follow up required</div>
            </div>
        </div>
    </div>
    
    <div id="user005" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User Details</h2>
                <span class="close" onclick="closeModal('user005')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="user-detail"><strong>ID:</strong> 005</div>
                <div class="user-detail"><strong>Name:</strong> David Chen</div>
                <div class="user-detail"><strong>Email:</strong> david.chen@example.com</div>
                <div class="user-detail"><strong>Phone:</strong> +1 (555) 567-8901</div>
                <div class="user-detail"><strong>Address:</strong> 654 Maple St, San Francisco, CA 94105</div>
                <div class="user-detail"><strong>Registration Date:</strong> 05 February 2025, 11:08 AM</div>
                <div class="user-detail"><strong>Last Login:</strong> 27 February 2025, 08:30 AM</div>
                <div class="user-detail"><strong>Status:</strong> <span class="status status-active">Active</span></div>
                <div class="user-detail"><strong>User Type:</strong> Premium</div>
                <div class="user-detail"><strong>Notes:</strong> Purchased annual plan, technical background</div>
            </div>
        </div>
    </div>
    
    <script>
        // Function to open the modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }
        
        // Function to close the modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
        
        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>