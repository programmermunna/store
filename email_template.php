<?php ob_start() ?>
<div style="background-color:#fff;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;border:1px solid gray;box-shadow:0 0 6px gray !important;">
    <thead>
      <tr>
        <th style="text-align:left;padding:20px"><img style="max-width: 150px;" src="https://www.bangladeshisoftware.com/wp-content/uploads/2022/09/2222_vectorized.png" alt="bachana tours"></th>
        <th style="text-align:right;font-weight:400;padding:20px">Date: <?php echo date("d-m-Y");?></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0"><?php echo $orders['status'];?></b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Payment Number</span> <?php echo $orders['pmn_number'];?></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span> <?php echo $orders['trans_id'];?></p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> ৳<?php echo $orders['amount'];?></p>
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bolder;font-size:18px;text-decoration:underline"><b>User</b></p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> <?php echo $orders['name'];?></p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> <?php echo $orders['email'];?></p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span> <?php echo $orders['address'];?></p>
        </td>
      </tr>

    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:30px 20px">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong> <?php echo $website['name'];?><br><br>
          <b>Email:</b> <?php echo $website['email'];?><br>
          <b>Address:</b> <?php echo $website['address'];?>
        </td>
      </tr>
    </tfooter>
  </table>
</div>
<?php  $email_template = ob_get_clean()?>
