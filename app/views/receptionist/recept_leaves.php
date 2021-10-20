<?php require APPROOT . "/views/inc/header.php"?>

<body class="layout-template-1"><?php $selectedMain="Leaves";
require APPROOT . "/views/receptionist/recept_sideNav.php"
?><?php $title="Leaves";
$username="Devin Dissanayake";
$userLevel="Receptionist";
require APPROOT . "/views/inc/headerBar.php"
?>< !--Content-->
      <div class="content recept leaves">
         <div class="leaverequesttable">
            <div class="cardandbutton">
               <div class="leavecountcard">
                  <div class="leavecountcardleft">Remaining Leaves</div>
                  <div class="leavecountcardright">2</div>
               </div>
               <div class="page-top-main-container"><button class="btn btn-filled btn-theme-purple btnleaveRequest">Add
                     New</button></div>
            </div><span class="leavelimitmsg"></span>
            <form class="form filter-options" action="">
               <div class="options-container">
                  <div class="left-section">
                     <div class="row statusopt">
                        <div class="column">
                           <div class="dropdown-group"><label class="label" for="lName">Status</label><select
                                 name="lstatus" id="lstatus">
                                 <option value="All" selected>All</option>
                                 <option value="Approved">Approved</option>
                                 <option value="Pending">Pending</option>
                                 <option value="Rejected">Rejected</option>
                              </select></div><span class="error"><?php echo " ";
?></span>
                        </div>
                     </div>
                  </div>
                  <div class="right-section"><a href="" class="btn btn-filled btn-black">Search</a>
                  
                  </div>
               </div>
            </form>
            <div class="table-container">
               <div class="table2 table2-responsive">
                  <table class="table2-hover" id="leaveReqTable">
                     <thead>
                        <tr>
                           <th class="column-center-align col-1">Leave Date</th>
                           <th class="column-center-align col-2">Requested date</th>
                           <th class="column-center-align col-3">Responded Staff ID</th>
                           <th class="column-center-align col-4">Status</th>
                           <th class="column-center-align col-5">Options</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td data-lable="Leave Date" class="column-center-align">2021-10-19</td>
                           <td data-lable="Requested date" class="column-center-align">2021-10-16</td>
                           <td data-lable="Responded Staff ID" class="column-center-align">Not yet Responded </td>

                           <td data-lable="Status" class="column-center-align">
                              <button type="button"
                                 class="table-btn yellow-status-btn text-uppercase " value="Pending">Pending
                              </button>
                              

                           </td>
                           <td data-lable="Action" class="column-center-align"><span><button
                                    class="editicon btnEditLeave"><a href="#" data-a=""><i
                                          class="ci-edit table-icon"></i></a></button><button
                                    class="editicon btnDeleteLeave"><a><i
                                          class="ci-trash table-icon"></i></a></button></span></td>
                        </tr>
                        <tr>
                           <td data-lable="Leave Date" class="column-center-align">2021-10-10</td>
                           <td data-lable="Requested date" class="column-center-align">2021-10-6</td>
                           <td data-lable="Responded Staff ID" class="column-center-align">Not yet Responded </td>

                           <td data-lable="Status" class="column-center-align">
                              <button type="button"
                                 class="table-btn yellow-status-btn text-uppercase " value="Pending">Pending
                              </button>
                             

                           </td>
                           <td data-lable="Action" class="column-center-align"><span><button
                                    class="editicon btnEditLeave"><a href="#" data-a=""><i
                                          class="ci-edit table-icon"></i></a></button><button
                                    class="editicon btnDeleteLeave"><a><i
                                          class="ci-trash table-icon"></i></a></button></span></td>
                        </tr>
                        <tr>
                           <td data-lable="Leave Date" class="column-center-align">2021-9-19</td>
                           <td data-lable="Requested date" class="column-center-align">2021-9-16</td>
                           <td data-lable="Responded Staff ID" class="column-center-align">000005 </td>

                           <td data-lable="Status" class="column-center-align">
                              <button type="button" class="table-btn green-status-btn text-uppercase" value="Approved"> Approved </button>
                           </td>
                           <td data-lable="Action" class="column-center-align"><span><button
                                    class="editicon btnEditLeave"><a href="#" data-a=""><i
                                          class="ci-edit table-icon"></i></a></button><button
                                    class="editicon btnDeleteLeave"><a><i
                                          class="ci-trash table-icon"></i></a></button></span></td>
                        </tr>
                        <tr>
                           <td data-lable="Leave Date" class="column-center-align">2021-8-20</td>
                           <td data-lable="Requested date" class="column-center-align">2021-8-18</td>
                           <td data-lable="Responded Staff ID" class="column-center-align">000005 </td>

                           <td data-lable="Status" class="column-center-align"><button type="button"
                                 class="table-btn red-status-btn text-uppercase value=" Rejected"> Rejected </button>

                           </td>
                           <td data-lable="Action" class="column-center-align"><span><button
                                    class="editicon btnEditLeave"><a href="#" data-a=""><i
                                          class="ci-edit table-icon"></i></a></button><button
                                    class="editicon btnDeleteLeave"><a><i
                                          class="ci-trash table-icon"></i></a></button></span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
           
               <div class="modal-container leaverequest ">
                  <div class="modal-box leave_request">
                     <div class="new-type-head">
                        <h1>Request Leave</h1>
                     </div>
                     <form action="<?php echo URLROOT; ?>/SerProvDashboard/leaves" class="form" method="POST">
                        <div class="row">
                           <div class="column">
                              <div class="text-group"><label class="labels" for="serviceName">Date</label><br><input
                                    type="date" name="date" id="takeLeaveDate" placeholder="--Select a date--"
                                    value="<?php echo $data['date']; ?>"></div><span class="error"><?php echo $data['date_error'];
?></span>
                           </div>
                        </div>
                        <div class="row">
                           <div class="column">
                              <div class="text-group"><label class="labels"
                                    for="serviceName">Reason</label><br><textarea type="text" name="reason"
                                    id="takeLeaveReason" placeholder="-- Type in --" class=""
                                    value="<?php echo $data['reason']; ?>"></textarea><span class="error"><?php echo $data['reason_error'];
?></span></div>
                           </div>
                        </div>
                        <div class="modalbutton">
                           <div class="btn1"><button type="submit" name="action" value="cancel"
                                 class="close-type-btn btn btnClose ">Cancel</button></div>
                           <div class="btn2"><button type="submit" name="action" value="addleave"
                                 class="confirm-service-btn">Request</button></div>
                        </div>
                     </form>
                  </div>
               </div>
           
                     <div class="modal-container edit-leave">
                        <div class="modal-box leave_request">
                           <div class="new-type-head">
                              <h1>Edit Leave</h1>
                           </div>
                           <form>
                              <div class="row">
                                 <div class="column">
                                    <div class="text-group"><label class="labels"
                                          for="serviceName">Date</label><br><input type="date" vale="2021-10-15"
                                          placeholder="--Select a date--" value="<?php echo $data['leaveData']; ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="column">
                                    <div class="text-group"><label class="labels"
                                          for="serviceName">Reason</label><br><textarea type="text"
                                          placeholder="-- Type in --" value="<?php echo $data['reason']; ?>"><?php if ($data['reason']==$data['reasonenterd']) echo $data['reason'];
?></textarea></div>
                                 </div>
                              </div>
                              <div class="modalbutton">
                                 <div class="btn1"><button type="submit" name="action" value="cancel"
                                       class="close-type-btn btn btnClose ">Cancel</button></div>
                                 <div class="btn2"><button type="submit" name="action" value="addleave"
                                       class="edit-leave confirm-service-btn">Save Changes</button></div>
                              </div>
                           </form>
                        </div>
                     </div>
                     
                           <div class="modal-container delete-leave">
                              <div class="modal-box leave_delete">
                                 <h4>Delete leave modal</h4>
                                 <div class="modalbutton">
                                    <div class="btn1"><button type="submit" name="action" value="cancel"
                                          class="close-type-btn btn btnClose ">Cancel</button></div>
                                    <div class="btn2"><button type="submit" name="action" value="deleteLeave"
                                          class="delete leave confirm-service-btn">Proceed</button></div>
                                 </div>
                              </div>
                           </div>
                          
         </div>
      </div>
   