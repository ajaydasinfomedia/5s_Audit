<?php
include('mpdf/mpdf.php');
include('fpdf.php');
//$mpdf=new mPDF('utf-8', 'Letter','10','dejavusans',0,0,0.01,0.01,0,0);
$mpdf=new mPDF('utf-8','Letter','10','dejavusans',0,0,30,25,9,10);
$mpdf->SetDisplayMode('default');
$mpdf->SetAutoFont(AUTOFONT_ALL);
$mpdf->ignore_invalid_utf8 = true;
//$hpg = $_REQUEST['frontpage'];
//$header = $_REQUEST['header'];
//$html = $_REQUEST['html'];
//$footer = $_REQUEST['footer'];


$hpg = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body style="width:100%;float:left;">﻿﻿﻿
					<div style="width: 100%;float:left;height: 100%;"><div style="position:absolute"><img src="http://5s.niftysol.com/windows_webservice/image/pdf_front_page.png">			
					</div><div style="position:absolute;float:left;margin-left:370px;margin-top:-400px;"></div><div style="position:absolute;float:left;margin-left:100px;margin-top:-120px;"></div><p style="font-family:Helvetica-Bold;font-size:20px;position:absolute;float:left;margin-left:600px;margin-top:-130px;color:white;">
					Auditor Name:Tata Consultancy Services</p>
					<p style="position:absolute;font-family:Helvetica-Bold;font-size:20px;float:left;margin-left:600px;margin-top:-80px;color:white;">Date:2013-10-24</p>
					<p style="position:absolute;font-family:Helvetica-Bold;font-size:30px;float:left;margin-left:300px;margin-top:-500px;">
					ISO 27002 Audit</p></div>';
					
$header = '<table style="width: 100%;float:left; border-bottom: 2px solid;"><tbody><tr><th colspan="4" style="width: 100%;text-align:center;
					border-bottom: 1px solid;font-weight:bold; font-size: 20px;">ISO 27002 Audit</th></tr>
						<tr>
						   <td style="width: 50%;padding: 5px;float: left;">Location Name:Italy</td>
						   <td style="width: 50%;padding: 5px;float: right;text-align: right;">Date:2013-10-24</td>
						</tr>
						<tr>
						   <td style="width: 50%;padding-left: 5px;float: left;">Company Name:Tata Consultancy Services</td>
						   <td style="width: 50%;float: right;text-align: right;">Auditor Name:parag</td>
						</tr>
						</tbody></table>';
						
$html = '<table style="width: 100%; float: left; border-bottom: 1px solid; border-collapse: collapse;">
		          <tbody><tr>
				      <th style="width: 10%;border-bottom: 1px solid;">Section</th>
					  <th style="width: 10%;border-bottom: 1px solid;">Title</th>
					  <th style="width: 50%;border-bottom: 1px solid;">Requirement</th>
					  <th style="width: 10%;border-bottom: 1px solid;">Conformance</th>
					  <th style="width: 20%;border-bottom: 1px solid;">Comments/Observation</th>
				  </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">6.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Internal Organization</td>
						   <td style="  padding: 5px; border-right: 1px solid;">6.1.1 Management commitment to information security Management should demonstrate active support for security measures within the organization. This can be done via clear direction, demonstrated commitment, explicit assignment and acknowledgement of infor</td><td style="text-align: center; border-right: 1px solid;">Minor</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">6.1.2 Information security coordination
In a large organization it might be necessary to coordinate information security measures through a cross- functional forum. </td><td style="text-align: center; border-right: 1px solid;">Minor</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">6.1.3 Allocation of information security responsibilities Responsibilities for the protection of individual assets and for carrying out specific security processes should be explicitly defined. This objective includes virus protection. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">6.1.4 Authorization process for IT facilities Installation of IT facilities should be technically approved and authorized. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">6.1.5 Confidentiality agreements
The organization\'s need for Confidentiality or Non-Disclosure Agreement (NDA) for protection of information should be clearly defined and regularly reviewed. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">6.1.6 Contact with authorities
The organization should have a procedure that describes when, and by whom: relevant authorities such as Law enforcement, fire department etc., should be contacted, and how the incident should be reported. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr>';

$html .= ' <tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">6.1.7 Contact with special interest groups The organization should maintain appropriate contacts with special interest groups or other specialist security forums, and professional associations. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">6.1.8 Independent review of information security The organization\'s approach to managing information security, and its implementation, should be reviewed independently at planned intervals, or when major changes to security implementation occur. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">7.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Responsibility of Assets</td>
						   <td style="  padding: 5px; border-right: 1px solid;">7.1.1 Inventory of assets
Inventories should be maintained of all major information and IT assets.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">7.1.2 Ownership of assets
Each asset identified should have an owner, a defined and agreed-upon security classification, and access restrictions that are periodically reviewed. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">7.1.3 Acceptable use of assets
Regulations for acceptable use of information and assets associated with an information processing facility should be identified, documented and implemented. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">7.2</td>
						   <td style=" text-align: center; border-right: 1px solid;">Information classification</td>
						   <td style="  padding: 5px; border-right: 1px solid;">7.2.1 Classification guidelines
Protection for classified information should be consistent with business needs.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">7.2.2 Information labeling and handling Classified information and outputs from systems handling organizationally classified data should be labeled appropriately. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">8.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Prior to employment</td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.1.1 Security in job descriptions</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.1.2 Recruitment screening </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.1.3 Terms and conditions of employment </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">8.2</td>
						   <td style=" text-align: center; border-right: 1px solid;">During employment</td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.2.1 Management responsibilities
Management should require employees, contractors and third party users to apply security in accordance with the established policies and procedures of the organization.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.2.2 Information security awareness, education and training All employees in the organization, and where relevant, contractors and third party users, should receive appropriate security awareness training and regular updates in organizational policies an </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.2.3 Disciplinary process
A disciplinary process is essential for dealing with security breaches. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">8.3</td>
						   <td style=" text-align: center; border-right: 1px solid;">Termination or change of employment</td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.3.1 Termination responsibilities
Responsibilities for performing employment termination, or change of employment, should be clearly defined and assigned.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.3.2 Return of assets
The organization should have a process in place that ensures all employees, contractors and third party users surrender all of the organization\'s assets in their possession upon termination of their employment, contract or agreemen </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">8.3.3 Removal of access rights
Access rights of all employees, contractors and third party users, to information and information processing facilities, should be removed upon termination of their employment, contract or agreement, or will be adjusted upo </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">9.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Secure areas</td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.1.1 Physical security perimeter
Physical security protection should be based on defined perimeters.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.1.2 Physical entry controls
Secure areas should be protected by appropriate entry controls.             				 </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.1.3 Securing Offices, rooms and facilities Data centers and computer rooms supporting critical business activities should have good physical security. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.1.4 Protecting against external and environment threats The physical protection against damage from fire, flood, earthquake, explosion, civil unrest and other forms of natural or man-made disaster should be designed and applied. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.1.5 Working in Secure Areas
Information should be provided only on a need to know basis.
There should be security controls in place for third parties or personnel working in secure areas. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.1.6 Isolated delivery loading areas
An intermediate holding area should be considered for deliveries to computer rooms.
A risk assessment should be used to determine the security required in delivery and loading areas. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">9.2</td>
						   <td style=" text-align: center; border-right: 1px solid;">Equipment security</td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.2.1 Equipment siting and protection
Equipment should be sited or protected to reduce the risks of damage, interference and unauthorized access.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.2.2 Power supplies
Equipment should be protected from power failures or other electrical anomalies. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.2.3 Cabling security
Power and telecommunication cabling should be protected from interception or damage. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.2.4 Equipment maintenance
Equipment should be appropriately maintained.
Logs should be maintained with all suspected or actual faults and all preventive and corrective measures.
Controls should be in place for equipment sent off-site. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.2.5 Security of equipment off- premises Security procedures and controls should cover the security of equipment used outside an organization\'s premises. The controls in place for the equipment should meet or exceed the security provided inside the premi </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr>';
						   
				$html .= '		   <tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">9.2.6 Secure disposal or re-use of equipment Data should be physically destroyed or securely over written. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Operational procedures and responsibilities</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.1.1 Documented operating procedures Documented procedures should be provided for the operation of all computer systems.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.1.2 Operational Change Control
All programs running on production systems should be subject to strict change control. All changes made to production programs should be logged. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.1.3 Incident management procedures Incident management responsibilities and procedures should be established. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.1.4 Segregation of duties
Segregation of duties minimizes the risk of negligent or deliberate system misuse. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.1.5 Separation of development and operational facilities Development and testing facilities should be isolated from operational systems. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.2</td>
						   <td style=" text-align: center; border-right: 1px solid;">Third party service delivery management</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.2.2 Monitoring and review of third party services The services, reports and records provided by third party should be regularly monitored and reviewed. Audits should be conducted on the above third party services, reports and records, on regular interv</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.2.3 Managing changes to third party services Changes to provision of services, including maintaining and improving existing information security policies, procedures and controls, should be managed. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.3</td>
						   <td style=" text-align: center; border-right: 1px solid;">System Planning and Acceptance</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.3.1 Capacity planning
Capacity requirements should be monitored to avoid failures due to inadequate capacity.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.3.2 System acceptance
Acceptance criteria for new systems should be established and suitable tests carried out prior to acceptance. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr>';

$html .= '<tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.4</td>
						   <td style=" text-align: center; border-right: 1px solid;">Protection from malicious software</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.4.1 Control against malicious code
Virus detection and prevention measures and appropriate user awareness procedures should be implemented.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.4.2 Control against mobile code
Only authorized mobile code should be used. The configuration should ensure that authorized mobile code operates according to security policy. Execution of unauthorized mobile code should be prevented. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.5</td>
						   <td style=" text-align: center; border-right: 1px solid;">Backup</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.5.1 Data back-up
Back-up copies of essential business data and software should be regularly taken. Backups should be stored securely well away from the actual site. Backup media should be regularly tested.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.6</td>
						   <td style=" text-align: center; border-right: 1px solid;">Network security management</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.6.1 Network security controls
A range of security controls is required in computer networks.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.6.2 Security of network services
The risks associated with the use of network services should be established. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.7</td>
						   <td style=" text-align: center; border-right: 1px solid;">Media handling</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.7.1 Management of removable computer media Removable computer media should be controlled.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.7.2 Disposal of media
Media should be disposed of securely and safely when no longer required. Sensitive information could be leaked to outside persons through careless disposal of media. Formal procedures for the secure disposal of media should be es </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.7.3 Information handling procedures Procedures for handling sensitive data should be established. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.7.4 Security of system documentation System documentation should be protected from unauthorized access. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.8</td>
						   <td style=" text-align: center; border-right: 1px solid;">Exchange of information</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.8.1 Information exchange policies and procedures Procedures and controls should be in place to protect the exchange of information through the use of voice, facsimile and video communications facilities.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.8.2 Information and software exchange agreements Agreements for the exchange of data and software should specify security controls. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.8.3 Security of media in transit
Computer media in transit should be protected from loss or misuse. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.8.4 Electronic Messaging
Whether the information involved in electronic messaging should be well protected. (Electronic messaging includes but is not restricted to Email, Electronic Data Interchange, Instant Messaging) </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.8.5 Business information systems
Clear policies and guidelines are required to control the business and security risks associated with electronic office systems. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.9</td>
						   <td style=" text-align: center; border-right: 1px solid;">Electronic commerce services</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.9.1 Electronic Commerce security
Special security controls should be applied where necessary to protect electronic commerce</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.9.2 On-Line Transactions
Information involved in online transactions should be protected to prevent incomplete transmission, mis- routing, unauthorized message alteration, unauthorized disclosure, unauthorized message duplication or replay. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr>';

$html .= '<tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.9.3 Publicly available systems
Care should be taken to protect the integrity of electronically published information to prevent unauthorized modification which could harm the reputation of the publishing organization. Information on a publicly availab </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">10.10</td>
						   <td style=" text-align: center; border-right: 1px solid;">Monitoring</td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.10.1 Audit logging
Audit trails of security events should be maintained.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.10.2 Monitoring system use
Procedures for monitoring system use should be established. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.10.3 Protection of log information
The Logging facility and log information should be well protected against tampering and unauthorized access. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.10.4 Administrator and Operator logs Computer operators should maintain a log of all work carried out. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.10.5 Fault logging
Faults should be reported and corrective action taken. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">10.10.6 Clock synchronization
Computer clocks should be synchronized for accurate recording. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">11.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Business requirement for system access</td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.1.1 Documented access control policy Business requirements for access control should be defined and documented.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">11.2</td>
						   <td style=" text-align: center; border-right: 1px solid;">User access management</td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.2.1 User registration
There should be a formal user registration and de-registration procedure for access to all multi-user IT services.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.2.2 Privilege management
The use of special privileges should be restricted and controlled. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.2.3 User password management
The allocation of user passwords should be securely controlled. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.2.4 Review of user access rights.
User access rights should be reviewed at regular intervals. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">11.3</td>
						   <td style=" text-align: center; border-right: 1px solid;">User responsibilities</td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.3.1 Password use
Users should follow good security practices in the selection and use of passwords.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.3.2 Unattended user equipment
Users should ensure that unattended equipment has appropriate security protection. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.3.3 Clear Desk and clear screen policy An automatic computer screen locking facility should be enabled.
Employees should be advised to leave any confidential material in the form of paper documents, media etc., only in suitable locked container while  </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">11.4</td>
						   <td style=" text-align: center; border-right: 1px solid;">Network access control</td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.4.1 Policy on use of network services
Users should only be able to gain access to the services that they are authorized to use.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.4.2 User authentication for external connections Connections by remote users via public (or non-organization) networks should be authenticated. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.4.3 Equipment identification in networks Automatic equipment identification should be considered as a means to authenticate connections from specific locations and equipment. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.4.4 Remote diagnostic and configuration port protection Access to diagnostic ports should be securely controlled. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.4.5 Segregation in networks
Large networks may have to be divided into separate domains. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.4.6 Network connection control
The connection capability of users may need to be controlled to support the access policy requirements of certain business applications. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.4.7 Network routing control
Shared networks may require network routing controls. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">11.5</td>
						   <td style=" text-align: center; border-right: 1px solid;">Computer system access control</td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.5.1 Secure logon procedures
Access to IT services should be via a secure logon process.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.5.2 User identification and authentication Computer activities should be traceable to individuals. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.5.3 Password management system
An effective password system should be used to authenticate users. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.5.4 Use of system utilities
Most computer installations have one or more system utility programs that might be capable of overriding system and application controls. It is essential that their use is restricted and tightly controlled. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.5.5 Session time-out
Inactive terminals in high risk locations, or serving high risk systems, should be set to time out, to prevent access by unauthorized persons. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.5.6 Limitation of connection time
Restrictions on connection times should provide additional security for high-risk applications. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">11.6</td>
						   <td style=" text-align: center; border-right: 1px solid;">Application and information access control</td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.6.1 Information access restriction
Access to data and IT services should be granted in accordance with business access policy.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.6.2 Sensitive system isolation
Sensitive systems might require a dedicated (isolated) computing environment. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">11.7</td>
						   <td style=" text-align: center; border-right: 1px solid;">Mobile computing and teleworking</td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.7.1 Mobile Computing and communications When using mobile computing facilities, e.g. notebooks, palmtops, laptops and mobile phones, special care should be taken to ensure that business information is not compromised.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr>';
			$html .= '			   <tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">11.7.2 Teleworking
Suitable protection of the teleworking site should be in place against, e.g., the theft of equipment and information, the unauthorized disclosure of information, unauthorized remote access to the organization\'s internal systems or misu </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">12.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Security requirements of information systems</td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.1.1 Security requirements analysis and specification An analysis of security requirements should be carried out at the requirements analysis stage of each development project.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">12.2</td>
						   <td style=" text-align: center; border-right: 1px solid;">Correct processing in applications</td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.2.1 Input data validation
Data input to application systems should be validated.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.2.2 Control of internal processing
Data that has been correctly entered can be corrupted by processing errors or through deliberate acts. Validation checks should be incorporated into systems to detect such corruption. The design of applications shoul </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.2.3 Message integrity
Requirements for ensuring and protecting message integrity in applications should be identified, and appropriate controls identified and implemented. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.2.4 Output data validation
Data output from an application system should be validated to ensure that the processing of stored information is correct and appropriate to the circumstances </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">12.3</td>
						   <td style=" text-align: center; border-right: 1px solid;">Cryptographic controls</td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.3.1 Policy on the use of cryptographic controls There should be a Policy in place regarding use of cryptographic controls for protection of information.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.3.2 Key management
Whether there is a management system is in place to support the organization\'s use of cryptographic techniques such as Secret key technique and Public key technique. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">12.4</td>
						   <td style=" text-align: center; border-right: 1px solid;">Security of system files</td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.4.1 Control of operational software
There should be formal change control procedures.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.4.2 Protection of system test data
System test data should be protected and controlled. The use of operational database containing personal information should be avoided for test purposes. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.4.3 Access control to program source library There should be strict controls in place over access to program source libraries. This is to reduce the potential for corruption of computer programs. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">12.5</td>
						   <td style=" text-align: center; border-right: 1px solid;">Security in development and support process</td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.5.1 Access control to program source library The organization should have strict control procedures in place over implementation of changes to the information system. (This is to minimize the corruption of the information system).</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.5.2 Technical review of applications after operating system changes The organization should have a process or procedure in place to review and test business critical applications for adverse impact on organizational operations or security after the cha </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.5.3 Access control to program source library All modifications to software packages are discouraged and/ or limited to necessary changes. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.5.4 Information leakage
The organization should have controls in place to prevent information leakage. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">12.6</td>
						   <td style=" text-align: center; border-right: 1px solid;">Technical Vulnerability Management</td>
						   <td style="  padding: 5px; border-right: 1px solid;">12.6.1 Control of technical vulnerabilities Timely information about technical vulnerabilities of information systems being used should be obtained. The organization\'s exposure to such vulnerabilities should be evaluated and appropriate measures taken to </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr>';
						   
				$html .= '		   <tr>
			               <td style=" text-align: center; border-right: 1px solid;">13.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Security in development and support process</td>
						   <td style="  padding: 5px; border-right: 1px solid;">13.3.1 Reporting of security incidents
Security incidents should be reported through management channels as quickly as possible.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">13.3.2 Reporting of security weaknesses Suspected security weaknesses should be reported. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">13.2</td>
						   <td style=" text-align: center; border-right: 1px solid;">Management of information security incidents and improvements</td>
						   <td style="  padding: 5px; border-right: 1px solid;">13.2.1 Responsibilities and procedures
Incident management responsibilities and procedures should be established.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">13.2.2 Learning from security incidents There should be mechanisms in place to enable the types, volumes and costs of incidents and malfunctions to be quantified and monitored. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">13.2.3 Collection of evidence
Follow-up action against a person or organization after an information security incident involves legal action (either civil or criminal). </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">14.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Aspects of business continuity planning</td>
						   <td style="  padding: 5px; border-right: 1px solid;">14.1.1 Including information security in the business continuity management process There should be a managed process in place for developing and maintaining business continuity plans across the organization.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">14.1.2 Business continuity and risk assessment A consistent framework of business continuity plans should be maintained. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">14.1.3 Developing and implementing continuity plans including information security Plans should be developed to maintain and restore business operations, ensure availability of information within the required level in the required time frame following an  </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">14.1.4 Business continuity planning framework The organization should have a single framework for the Business continuity plan. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">14.1.5 Business continuity and risk assessment The organization should have a single framework for the Business continuity plan. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">15.1</td>
						   <td style=" text-align: center; border-right: 1px solid;">Compliance with legal requirements</td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.1.1 Identification of applicable legislation All relevant statutory, regulatory, contractual requirements and organizational approach to meet the requirements should be explicitly defined and documented for each information system and organization.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.1.2 Intellectual property rights (IPR) The organization should have procedures to ensure compliance with legislative, regulatory and contractual requirements on the use of material in respect of which there may be intellectual property rights and on th </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.1.3 Protection of organizational records Important records of an organization should be protected from loss, destruction and falsification. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.1.4 Data protection and privacy of personal information Applications handling personal data on individuals should comply with data protection legislation and principles. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.1.5 Prevention of misuse of information processing facility IT facilities should only be used for authorized business purposes. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.1.6 Regulation of cryptographic controls Cryptographic controls should used in compliance with all relevant agreements, laws, and regulations. </td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">15.2</td>
						   <td style=" text-align: center; border-right: 1px solid;">Compliance with security policies and standards, and technical compliance</td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.2.1 Compliance with security policy and standards All areas within the organization should be considered for regular review to ensure compliance with security policies and standards.</td><td style="text-align: center; border-right: 1px solid;">Major</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.2.2 Technical compliance checking
IT facilities should be regularly checked for compliance with security implementation standards. </td><td style="text-align: center; border-right: 1px solid;">Major</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">15.3</td>
						   <td style=" text-align: center; border-right: 1px solid;">Information System audit considerations</td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.3.1 Information systems audit controls Audit requirements and activities involving checks on operational systems should be carefully planned and agreed to minimize the risk of disruptions to business process.</td><td style="text-align: center; border-right: 1px solid;">YES</td><td></td> </tr><tr>
			               <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style=" text-align: center; border-right: 1px solid;">&nbsp; </td>
						   <td style="  padding: 5px; border-right: 1px solid;">15.3.2 Protection of information system audit tools Access to information system audit tools such as software or data files should be protected to prevent any possible misuse or compromise. </td><td style="text-align: center; border-right: 1px solid;">Minor</td><td>dsfdsfdfdfddff</td> </tr><tr>
				   <td colspan="6" style="min-height: 34px;float:left;background:#4C5966; color: #FFFFFF;" align="center">Recommendation</td>
				     </tr>
				<tr>
					<td colspan="6" style="float:left;padding-left: 5px;text-align: left;width: 100%;border-bottom: 1px solid;">fdgggfgfgfdgfdgfd</td> </tr>
				<tr></tr></tbody></table>';						


$footer = '<table style="width: 100%;float:left;">	<tbody><tr><th colspan="4" style="width: 100%;text-align:right;font-weight:normal;"> powered by parag </th> </tr>  </tbody></table></body></html>';


$mpdf->WriteHTML($hpg);

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($html);

$dir=  "pdf/";                       
$name_of_pdf =$dir.$_REQUEST['file'].'.pdf';
echo 'path=>'.'http://5s.niftysol.com/windows_webservice/'.$name_of_pdf; 
if(file_exists($name_of_pdf))
{
	//delete and recreate it
	unlink($name_of_pdf);
	$mpdf->Output($name_of_pdf,'F');
}
else
{
	$mpdf->Output($name_of_pdf,'F');
}
$mpdf->PrintBodyBackgrounds();
$pdf = $_SERVER["DOCUMENT_ROOT"].'/windows_webservice/'.$name_of_pdf;
$url = 'http://5s.niftysol.com/windows_webservice/mail/curlemail.php';
$strdata="emails=".$_REQUEST['email']."&content=Please Find Attached Pdf Report&subject=Your 5s Audit Report&pdf=".$pdf;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch,CURLOPT_POST, 4);
curl_setopt($ch,CURLOPT_POSTFIELDS, $strdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
curl_close($ch);
?>