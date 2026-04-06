<?php
/* Backend script for secure Administrative operations */
session_start();
require '../login-system/db.php';

// Security Check
if ($_SESSION['logged_in'] == 0 || $_SESSION['account_type'] != 'Admin') {
  $_SESSION['message'] = "You must log in as an Admin to view this restricted page!";
  header("location: ../login-system/error.php");   
  exit(); 
}

// Fetch Metrics
$users_res = $mysqli->query("SELECT COUNT(*) as count FROM users WHERE account_type='Personal'");
$total_users = $users_res->fetch_assoc()['count'];

$stores_res = $mysqli->query("SELECT COUNT(*) as count FROM users WHERE account_type='Business'");
$total_stores = $stores_res->fetch_assoc()['count'];

$prod_res = $mysqli->query("SELECT COUNT(*) as count FROM productlist");
$total_products = $prod_res->fetch_assoc()['count'];

// Fetch Data for Tables
$users_personal_query = $mysqli->query("SELECT * FROM users WHERE account_type='Personal' ORDER BY name ASC");
$users_business_query = $mysqli->query("SELECT * FROM users WHERE account_type='Business' ORDER BY name ASC");
$products_query = $mysqli->query("SELECT * FROM productlist ORDER BY id DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
      body { background-color: #f4f6fc; font-family: 'Inter', sans-serif; }
      .metric-card {
          background: white; border-radius: 15px; padding: 30px 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.04); text-align: center; 
          transition: transform 0.3s ease; border-left: 5px solid transparent;
      }
      .metric-card:hover { transform: translateY(-5px); }
      .metric-number { font-size: 42px; font-weight: 900; color: #2c3e50; margin: 10px 0 0; }
      .metric-label { font-size: 13px; text-transform: uppercase; font-weight: 800; color: #95a5a6; letter-spacing: 1px; }
      
      .table-custom { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.04); margin-bottom: 50px; border: 1px solid #edf2f9; }
      .table-custom th { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; padding: 18px 20px; border: none; font-weight: 600; font-size: 15px; }
      .table-custom td { padding: 18px 20px; vertical-align: middle !important; border-top: 1px solid #edf2f9; color: #2c3e50; }
      .table-custom tr:hover td { background-color: #fcfcfc; }
      .section-title { font-weight: 800; color: #2c3e50; margin-bottom: 25px; font-size: 24px; position: relative; padding-bottom: 10px; }
      .section-title::after { content:''; position:absolute; bottom:0; left:0; width: 50px; height: 3px; background: #F8A036; border-radius: 3px; }
      .dashboard-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.04); border-top: 5px solid #F8A036; }
  </style>
</head>

<body>

    <?php include "header.php" ?>
    <?php include "header2.php" ?>
    <?php include "sidebar.php" ?>

    <div class="container" style="margin-top: 50px; margin-bottom: 80px; width: 100%; max-width: 1100px;">
        
        <div class="dashboard-header">
            <div>
                <h2 style="color: #2c3e50; font-weight: 900; margin: 0; font-size: 32px;">System Control Panel</h2>
                <p style="color: #7f8c8d; margin-top: 8px; font-size: 16px;">Manage marketplace activity securely.</p>
            </div>
            <a href="../login-system/logout.php" class="btn btn-accent" style="border-radius: 50px; font-weight: 800; padding: 12px 25px; background-color: #e74c3c; border: none; box-shadow: 0 4px 15px rgba(231,76,60,0.3);"><i class="fa fa-sign-out"></i> Secure Logout</a>
        </div>

        <!-- Metrics Row -->
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-4">
                <div class="metric-card" style="border-color: #3498db;">
                    <div class="metric-label">Registered Buyers</div>
                    <div class="metric-number"><?= $total_users ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric-card" style="border-color: #9b59b6;">
                    <div class="metric-label">Business Sellers</div>
                    <div class="metric-number"><?= $total_stores ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric-card" style="border-color: #e74c3c;">
                    <div class="metric-label">Active Products</div>
                    <div class="metric-number"><?= $total_products ?></div>
                </div>
            </div>
        </div>

        <!-- Buyers Management Table -->
        <h3 class="section-title">List of Users (Buyers)</h3>
        <div class="table-custom table-responsive">
            <table class="table" style="margin: 0;">
                <thead>
                    <tr>
                        <th style="width: 40px;"><input type="checkbox" id="selectAllBuyers" onclick="toggleSelectAll('buyer_cb', this)"></th>
                        <th>Account Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form id="bulkActionForm" action="../login-system/admin_action.php" method="POST">
                        <input type="hidden" name="action_type" value="bulk_deactivate">
                        <div style="padding: 15px; background: #fff; border-bottom: 1px solid #eee; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 13px; color: #666; font-weight: 600;"><i class="fa fa-info-circle"></i> Bulk Actions for Selected Users</span>
                            <button type="submit" class="btn btn-sm btn-accent" style="border-radius: 8px; font-weight: 800; background-color: #333;"><i class="fa fa-ban"></i> Deactivate Selected</button>
                        </div>
                    <?php while($u = $users_personal_query->fetch_assoc()): ?>
                    <?php $u_hash = md5($u['email']); ?>
                    <tr>
                        <td><input type="checkbox" name="bulk_emails[]" value="<?= htmlspecialchars($u['email']) ?>" class="buyer_cb"></td>
                        <td style="font-weight: 700;"><?= htmlspecialchars($u['name']) ?></td>
                        <td><?= htmlspecialchars($u['email']) ?></td>
                        <td><?= htmlspecialchars($u['phone'] ?? 'N/A') ?></td>
                        <td>
                            <?php if($u['active'] == 1): ?>
                                <span class="badge" style="background-color: #27ae60; padding: 6px 10px; border-radius: 8px; font-size: 12px;"><i class="fa fa-check"></i> Active</span>
                            <?php else: ?>
                                <span class="badge" style="background-color: #e74c3c; padding: 6px 10px; border-radius: 8px; font-size: 12px;"><i class="fa fa-times"></i> Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: right;">
                            <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUserModal_<?= $u_hash ?>" style="border-radius: 5px; font-weight: 700;"><i class="fa fa-pencil"></i> Edit</button>
                                
                                <?php if($u['active'] == 0): ?>
                                <form action="../login-system/admin_action.php" method="POST" style="margin:0;">
                                    <input type="hidden" name="action_type" value="activate_user">
                                    <input type="hidden" name="user_email" value="<?= htmlspecialchars($u['email']) ?>">
                                    <button type="submit" class="btn btn-sm" style="border-radius: 5px; font-weight: 700; background-color: #27ae60; color: white; border: none; padding: 5px 12px;"><i class="fa fa-check"></i> Activate</button>
                                </form>
                                <?php else: ?>
                                <form action="../login-system/admin_action.php" method="POST" style="margin:0;">
                                    <input type="hidden" name="action_type" value="deactivate_user">
                                    <input type="hidden" name="user_email" value="<?= htmlspecialchars($u['email']) ?>">
                                    <button type="submit" class="btn btn-sm" style="border-radius: 5px; font-weight: 700; background-color: #333; color: white; border: none; padding: 5px 12px;"><i class="fa fa-ban"></i> Deactivate</button>
                                </form>
                                <?php endif; ?>

                                <form action="../login-system/admin_action.php" method="POST" style="margin:0;" onsubmit="return confirm('WARNING: Permanently delete this user?');">
                                    <input type="hidden" name="action_type" value="delete_user">
                                    <input type="hidden" name="user_email" value="<?= htmlspecialchars($u['email']) ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 5px; font-weight: 700;"><i class="fa fa-trash"></i> Drop</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModal_<?= $u_hash ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border-radius: 15px; overflow: hidden; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
                                <div class="modal-header" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; border: none;">
                                    <h4 class="modal-title" style="font-weight: 800;">Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal" style="color: white; opacity: 1;">&times;</button>
                                </div>
                                <form action="../login-system/admin_action.php" method="POST">
                                    <div class="modal-body" style="padding: 30px;">
                                        <input type="hidden" name="action_type" value="edit_user">
                                        <input type="hidden" name="user_original_email" value="<?= htmlspecialchars($u['email']) ?>">
                                        
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Full Name</label>
                                            <input type="text" class="form-control" name="user_name" value="<?= htmlspecialchars($u['name']) ?>" required style="border-radius: 8px; height: 45px;">
                                        </div>
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Email Address</label>
                                            <input type="email" class="form-control" name="user_email" value="<?= htmlspecialchars($u['email']) ?>" required style="border-radius: 8px; height: 45px;">
                                        </div>
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Phone Number</label>
                                            <input type="text" class="form-control" name="user_phone" value="<?= htmlspecialchars($u['phone'] ?? '') ?>" style="border-radius: 8px; height: 45px;">
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="border-top: 1px solid #edf2f9; padding: 20px 30px;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 8px; font-weight: 700;">Close</button>
                                        <button type="submit" class="btn btn-primary" style="border-radius: 8px; font-weight: 700; background-color: #3498db; border: none;">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    </form>
                </tbody>
            </table>
        </div>

        <!-- Sellers Management Table -->
        <h3 class="section-title">List of Sellers (Stores)</h3>
        <div class="table-custom table-responsive">
            <table class="table" style="margin: 0;">
                <thead>
                    <tr>
                        <th style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%); width: 40px;"><input type="checkbox" id="selectAllSellers" onclick="toggleSelectAll('seller_cb', this)"></th>
                        <th style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);">Account Name</th>
                        <th style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);">Email Address</th>
                        <th style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);">Phone Number</th>
                        <th style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);">Status</th>
                        <th style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%); text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form id="bulkActionFormSellers" action="../login-system/admin_action.php" method="POST">
                        <input type="hidden" name="action_type" value="bulk_deactivate">
                        <div style="padding: 15px; background: #fff; border-bottom: 1px solid #eee; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 13px; color: #666; font-weight: 600;"><i class="fa fa-info-circle"></i> Bulk Actions for Selected Stores</span>
                            <button type="submit" class="btn btn-sm btn-accent" style="border-radius: 8px; font-weight: 800; background-color: #333;"><i class="fa fa-ban"></i> Deactivate Selected</button>
                        </div>
                    <?php while($s = $users_business_query->fetch_assoc()): ?>
                    <?php $s_hash = md5($s['email']); ?>
                    <tr>
                        <td><input type="checkbox" name="bulk_emails[]" value="<?= htmlspecialchars($s['email']) ?>" class="seller_cb"></td>
                        <td style="font-weight: 700;"><?= htmlspecialchars($s['name']) ?></td>
                        <td><?= htmlspecialchars($s['email']) ?></td>
                        <td><?= htmlspecialchars($s['phone'] ?? 'N/A') ?></td>
                        <td>
                            <?php if($s['active'] == 1): ?>
                                <span class="badge" style="background-color: #27ae60; padding: 6px 10px; border-radius: 8px; font-size: 12px;"><i class="fa fa-check"></i> Active</span>
                            <?php else: ?>
                                <span class="badge" style="background-color: #e74c3c; padding: 6px 10px; border-radius: 8px; font-size: 12px;"><i class="fa fa-times"></i> Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: right;">
                            <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUserModal_<?= $s_hash ?>" style="border-radius: 5px; font-weight: 700; background-color: #9b59b6; border-color: #9b59b6;"><i class="fa fa-pencil"></i> Edit</button>
                                
                                <?php if($s['active'] == 0): ?>
                                <form action="../login-system/admin_action.php" method="POST" style="margin:0;">
                                    <input type="hidden" name="action_type" value="activate_user">
                                    <input type="hidden" name="user_email" value="<?= htmlspecialchars($s['email']) ?>">
                                    <button type="submit" class="btn btn-sm" style="border-radius: 5px; font-weight: 700; background-color: #27ae60; color: white; border: none; padding: 5px 12px;"><i class="fa fa-check"></i> Activate</button>
                                </form>
                                <?php else: ?>
                                <form action="../login-system/admin_action.php" method="POST" style="margin:0;">
                                    <input type="hidden" name="action_type" value="deactivate_user">
                                    <input type="hidden" name="user_email" value="<?= htmlspecialchars($s['email']) ?>">
                                    <button type="submit" class="btn btn-sm" style="border-radius: 5px; font-weight: 700; background-color: #333; color: white; border: none; padding: 5px 12px;"><i class="fa fa-ban"></i> Deactivate</button>
                                </form>
                                <?php endif; ?>

                                <form action="../login-system/admin_action.php" method="POST" style="margin:0;" onsubmit="return confirm('WARNING: Permanently delete this store and products?');">
                                    <input type="hidden" name="action_type" value="delete_user">
                                    <input type="hidden" name="user_email" value="<?= htmlspecialchars($s['email']) ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 5px; font-weight: 700;"><i class="fa fa-trash"></i> Drop</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Seller Modal (Reusing identical logic to Users) -->
                    <div class="modal fade" id="editUserModal_<?= $s_hash ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border-radius: 15px; overflow: hidden; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
                                <div class="modal-header" style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%); color: white; border: none;">
                                    <h4 class="modal-title" style="font-weight: 800;">Edit Seller Account</h4>
                                    <button type="button" class="close" data-dismiss="modal" style="color: white; opacity: 1;">&times;</button>
                                </div>
                                <form action="../login-system/admin_action.php" method="POST">
                                    <div class="modal-body" style="padding: 30px;">
                                        <input type="hidden" name="action_type" value="edit_user">
                                        <input type="hidden" name="user_original_email" value="<?= htmlspecialchars($s['email']) ?>">
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Full Name</label>
                                            <input type="text" class="form-control" name="user_name" value="<?= htmlspecialchars($s['name']) ?>" required style="border-radius: 8px; height: 45px;">
                                        </div>
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Email Address</label>
                                            <input type="email" class="form-control" name="user_email" value="<?= htmlspecialchars($s['email']) ?>" required style="border-radius: 8px; height: 45px;">
                                        </div>
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Phone Number</label>
                                            <input type="text" class="form-control" name="user_phone" value="<?= htmlspecialchars($s['phone'] ?? '') ?>" style="border-radius: 8px; height: 45px;">
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="border-top: 1px solid #edf2f9; padding: 20px 30px;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 8px; font-weight: 700;">Close</button>
                                        <button type="submit" class="btn btn-primary" style="border-radius: 8px; font-weight: 700; background-color: #9b59b6; border: none;">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    </form>
                </tbody>
            </table>
        </div>

        <!-- Products Management Table -->
        <h3 class="section-title">Manage Products</h3>
        <div class="table-custom table-responsive">
            <table class="table" style="margin: 0;">
                <thead>
                    <tr>
                        <th style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);">Product Name</th>
                        <th style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);">Store/Shop Name</th>
                        <th style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);">Price (UGX)</th>
                        <th style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);">Stock</th>
                        <th style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($p = $products_query->fetch_assoc()): ?>
                    <tr>
                        <td style="font-weight: 700;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <img src="../seller/productPic/<?= htmlspecialchars($p['productPic']) ?>" style="width: 45px; height: 45px; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <?= htmlspecialchars($p['productName']) ?>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($p['shopName']) ?></td>
                        <td style="font-weight: 800; color: #e74c3c;"><?= number_format($p['price']) ?></td>
                        <td><span class="badge" style="background-color: #2c3e50; font-size: 13px; font-weight: 800; padding: 6px 10px; border-radius: 8px;"><?= $p['quantity'] ?> units</span></td>
                        <td style="text-align: right;">
                            <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editProductModal_<?= $p['id'] ?>" style="border-radius: 5px; font-weight: 700; background-color: #e74c3c; border-color: #e74c3c;"><i class="fa fa-pencil"></i> Edit</button>
                                <form action="../login-system/admin_action.php" method="POST" style="margin:0;" onsubmit="return confirm('Are you sure you want to permanently remove this product?');">
                                    <input type="hidden" name="action_type" value="delete_product">
                                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 5px; font-weight: 700;"><i class="fa fa-trash"></i> Drop</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Product Modal -->
                    <div class="modal fade" id="editProductModal_<?= $p['id'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border-radius: 15px; overflow: hidden; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
                                <div class="modal-header" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white; border: none;">
                                    <h4 class="modal-title" style="font-weight: 800;">Edit Product Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" style="color: white; opacity: 1;">&times;</button>
                                </div>
                                <form action="../login-system/admin_action.php" method="POST">
                                    <div class="modal-body" style="padding: 30px;">
                                        <input type="hidden" name="action_type" value="edit_product">
                                        <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Product Name</label>
                                            <input type="text" class="form-control" name="product_name" value="<?= htmlspecialchars($p['productName']) ?>" required style="border-radius: 8px; height: 45px;">
                                        </div>
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Price (UGX)</label>
                                            <input type="number" class="form-control" name="product_price" value="<?= $p['price'] ?>" required style="border-radius: 8px; height: 45px;">
                                        </div>
                                        <div class="form-group" style="text-align: left;">
                                            <label style="font-weight: 700; color: #2c3e50;">Available Stock</label>
                                            <input type="number" class="form-control" name="product_quantity" value="<?= $p['quantity'] ?>" required style="border-radius: 8px; height: 45px;">
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="border-top: 1px solid #edf2f9; padding: 20px 30px;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 8px; font-weight: 700;">Close</button>
                                        <button type="submit" class="btn btn-primary" style="border-radius: 8px; font-weight: 700; background-color: #e74c3c; border: none;">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>
    
    <?php include "footer.php" ?>

    <script>
    function toggleSelectAll(className, source) {
        var checkboxes = document.getElementsByClassName(className);
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
    </script>

</body>
</html>
