<?php
    include("core/init.php");
    
    //Create DB object
    $db=new Database;
    
    //Run Query
    $db->query("select * from contacts");
    
    //Assign result set
    $contacts=$db->resultset();
?>
<div class="grid-x grid-padding-x"><!-- row -->
    <div class="large-12 cell">
        <table>
            <thead>
                <tr>
                    <th width="200">Name</th>
                    <th width="130">Phone</th>
                    <th width="200">E-mail</th>
                    <th width="250">Address</th>
                    <th width="100">Group</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contacts as $contact) : ?>
                <tr>
                    <td><a href="contact.html"><?php echo $contact->first_name." ".$contact->last_name; ?></a></td>
                    <td><?php echo $contact->phone; ?></td>
                    <td><?php echo $contact->email; ?></td>
                    <td>
                        <ul>
                            <li><?php echo $contact->address1; ?></li>
                            <?php
                              if($contact->address2) echo "<li>".$contact->address2."</li>";
                            ?>
                            <li><?php echo $contact->city; ?>, <?php echo $contact->state; ?> <?php echo $contact->zipcode; ?></li>
                        </ul>
                    </td>
                    <td><?php echo $contact->contact_group; ?></td>
                    <td>
                        <ul class="button-group">
                            <li>
                                <a href="#" class="button tiny edit-btn" data-open="editModal<?php echo $contact->id; ?>" data-contact-id="<?php echo $contact->id; ?>">Edit</a>
                                <div id="editModal<?php echo $contact->id; ?>" data-cid="<?php echo $contact->id; ?>" class="reveal editModal" data-reveal>
                                    <h2>Edit Contact</h2>
                                    <form id="editContact" action="#" method="post">
                                      <div class="grid-x grid-padding-x"><!-- row -->
                                        <div class="large-6 cell">
                                          <label>First Name
                                            <input type="text" name="first_name" placeholder="Enter First Name" value="<?php echo $contact->first_name; ?>" />
                                          </label>
                                        </div>
                                        <div class="large-6 cell">
                                          <label>Last Name
                                            <input type="text" name="last_name" placeholder="Enter Last Name" value="<?php echo $contact->last_name; ?>" />
                                          </label>
                                        </div>
                                      </div>
                                      <div class="grid-x grid-padding-x"><!-- row -->
                                        <div class="large-4 cell">
                                          <label>E-mail
                                            <input type="email" name="email" placeholder="Enter E-mail Address" value="<?php echo $contact->email; ?>" />
                                          </label>
                                        </div>
                                        <div class="large-4 cell">
                                          <label>Phone Number
                                            <input type="text" name="phone" placeholder="Enter Phone Number" value="<?php echo $contact->phone; ?>" />
                                          </label>
                                        </div>
                                        <div class="large-4 cell">
                                          <label>Contact Group
                                            <select name="contact_group">
                                              <option value="Family" <?php if($contact->contact_group=="Family") echo "selected"; ?>>Family</option>
                                              <option value="Friends" <?php if($contact->contact_group=="Friends") echo "selected"; ?>>Friends</option>
                                              <option value="Business" <?php if($contact->contact_group=="Business") echo "selected"; ?>>Business</option>
                                            </select>
                                          </label>
                                        </div>
                                      </div>
                                      <div class="grid-x grid-padding-x"><!-- row -->
                                        <div class="large-6 cell">
                                          <label>Address 1
                                            <input type="text" name="address1" placeholder="Enter Address 1" value="<?php echo $contact->address1; ?>" />
                                          </label>
                                        </div>
                                        <div class="large-6 cell">
                                          <label>Address 2
                                            <input type="text" name="address2" placeholder="Enter Address 2" value="<?php echo $contact->address2; ?>" />
                                          </label>
                                        </div>
                                      </div>
                                      <div class="grid-x grid-padding-x"><!-- row -->
                                        <div class="large-4 cell">
                                          <label>City
                                            <input type="text" name="city" placeholder="Enter City" value="<?php echo $contact->city; ?>" />
                                          </label>
                                        </div>
                                        <div class="large-4 cell">
                                          <label>State
                                            <select name="state">
                                                <?php
                                                    foreach($states as $key => $value){
                                                ?>
                                                        <option value="<?php echo $key; ?>" <?php if($contact->state==$key) echo "selected"; ?>>
                                                        <?php echo $value; ?>
                                                        </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                          </label>
                                        </div>
                                        <div class="large-4 cell">
                                          <label>Zipcode
                                            <input type="text" name="zipcode" placeholder="Enter Zipcode" value="<?php echo $contact->zipcode; ?>" />
                                          </label>
                                        </div>
                                      </div>
                                      <div class="grid-x grid-padding-x"><!-- row -->
                                        <div class="large-12 cell">
                                          <label>Notes
                                            <textarea name="notes" placeholder="Enter Optional Notes"><?php echo $contact->notes; ?></textarea>
                                          </label>
                                        </div>
                                      </div>
                                      <input type="hidden" name="id" value="<?php echo $contact->id; ?>" />
                                      <input type="submit" name="submit" class="add-btn button float-right small" value="Submit" />
                                      <a class="close-button" data-close>&times;</a>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <form id="deleteContact" action="#" method="post">
                                    <input type="hidden" name="id" value="<?php echo $contact->id; ?>" />
                                    <input type="submit" class="delete-btn button tiny secondary alert" value="Delete" />
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>