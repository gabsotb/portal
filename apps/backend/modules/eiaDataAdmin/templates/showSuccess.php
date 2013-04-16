<div class="row-fluid">
	<div class="span8" id="right-column">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-info-sign"></i><?php echo __('GENERAL INFORMATION') ?></h4>
			</div>
			<div class="widget-body">
			   <div class="alert alert-success">
				<h4><?php echo __('PROJECT TITLE') ?>:&nbsp;<?php echo $detail->getEIAProjectDetail()->getProjectTitle() ?></h4>
			   </div>
				
				<div class="well">
				  <div class="alert alert-info">
				  <h4><?php echo __('PROJECT LOCATION') ?></h4>
			      </div>
				<?php if(!is_null($detail->getEIAProjectDetail()->getProjectPlotNumber())): ?>
				<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
			        <li><span><i class="icon-minus"></i></span>
					<b><?php echo __('Plot Number') ?></b>: &nbsp;<?php echo $detail->getEIAProjectDetail()->getProjectPlotNumber() ?></li>
				<?php endif; ?>
				<?php if(!is_null($detail->getEIAProjectDetail()->getVillage())): ?>
				<li><span><i class="icon-eye-open"></i></span>
				<b><?php echo __('Village') ?></b> :&nbsp;<?php echo strtoupper($detail->getEIAProjectDetail()->getVillage()) ?></li>
				<?php endif; ?>
				
				<?php if(!is_null($detail->getEIAProjectDetail()->getCell())): ?>
				<li><span><i class="icon-eye-open"></i></span>
				<b><?php echo __('Cell') ?></b>:&nbsp;<?php echo strtoupper($detail->getEIAProjectDetail()->getCell()) ?> </li>
				<?php endif; ?>
				
				<li><span><i class="icon-eye-open"></i></span>
				<b><?php echo __('Sector') ?></b>:&nbsp;<?php echo strtoupper($detail->getEIAProjectDetail()->getSector()) ?> </li>
				<li><span><i class="icon-eye-open"></i></span>
				<b><?php echo __('District') ?></b>:&nbsp;<?php echo strtoupper($detail->getEIAProjectDetail()->getDistrict()) ?>  </li>
				<li><span><i class="icon-eye-open"></i></span><b><?php echo __('Province') ?></b>:&nbsp;<?php echo strtoupper(str_replace("_"," ",$detail->getEIAProjectDetail()->getProvince())) ?> </li>
				 </ul>
				</div>
				<div class="well">
				<div class="alert alert-info">
				<h4><?php echo __('PROJECT DEVELOPER') ?></h4>
			    </div>
				<?php foreach($developers as $developer):?>
				<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
				<li><span><i class="icon-user"></i></span><b><?php echo __('Developer') ?></b>:&nbsp;<?php echo $developer->getDeveloperName() ?></li>
				
				<li><span><i class="icon-user"></i></span><b><?php echo __('Contant Person') ?></b>:&nbsp;<?php echo $developer->getContactPerson() ?></li>
				
				<?php if(!is_null($developer->getAddress())): ?>
				<li><span><i class="icon-user"></i></span><b><?php echo __('Address') ?></b>:&nbsp;<?php echo $developer->getAddress() ?></li>
				<?php endif; ?>
				
				<?php if(!is_null($developer->getTelephone())): ?>
				<li><span><i class="icon-user"></i></span><b><?php echo __('Telephone') ?></b>:&nbsp;<?php echo $developer->getTelephone() ?></li>
				<?php endif; ?>
				
				<?php if(!is_null($developer->getMobilePhone())): ?>
				<li><span><i class="icon-user"></i></span><b><?php echo __('Mobile Phone') ?></b>:&nbsp;<?php echo $developer->getMobilePhone() ?></li>
				<?php endif; ?>
				<p><?php echo __('E-mail') ?>:&nbsp;<?php //echo mail_to($developer->getEmailAddress()) ?></p>
				<li><span><i class="icon-user"></i></span><b><?php echo __('E-mail') ?></b>:&nbsp;<?php echo $developer->getEmailAddress() ?></li>
				<li><span><i class="icon-eye-open"></i></span><b><?php echo __('Social Network') ?></b>:&nbsp;<?php echo $developer->getCommunicationMode() ?></li>
				
				<?php if(!is_null($developer->getCommunicationMode())): ?>
				<li><span><i class="icon-user"></i></span><b><?php echo __('Account name') ?></b>:&nbsp;<?php echo $developer->getSocialMediaAccount() ?></li>
				<?php endif; ?>
				</ul>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="span4 sortable ui-sortable">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-lightbulb"></i><?php echo __('Instruction') ?></h4>
			</div>
			<div class="widget-body">
				<div class="alert alert-info">
				<?php echo $detail->getInstructions(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="span4 sortable ui-sortable">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-paper-clip"></i><?php echo __('Attachments') ?></h4>
			</div>
			<div class="widget-body">
			<?php foreach($attachments as $attachment): ?>
			<ul class="item-list">
				<?php if(!is_null($attachment->getPanoramicView())): ?>
				<li><?php echo link_to('Panoramic view','/uploads/documents/eia_documents/'.$attachment->getPanoramicView(),array('target' => '_blank')) ?></li>
				<?php endif; ?>
				<?php if(!is_null($attachment->getPerspectiveSiteImpact())): ?>
				<li><?php echo link_to('Plans(Perspective and site layout plan)','/uploads/documents/eia_documents/'.$attachment->getPerspectiveSiteImpact(),array('target' => '_blank')) ?></li>
				<?php endif; ?>
				<li><?php echo link_to('Preliminary approval','/uploads/documents/eia_documents/'.$attachment->getPreliminaryApproval(),array('target' => '_blank')) ?></li>
				<?php if(!is_null($attachment->getLandOwnershipDoc())): ?>
				<li><?php echo link_to('Land ownership','/uploads/documents/eia_documents/'.$attachment->getLandOwnershipDoc(),array('target' => '_blank')) ?></li>
				<?php endif; ?>
				<?php if(!is_null($attachment->getMinistrialDocument())): ?>
				<li><?php echo link_to('Ministerial order','/uploads/documents/eia_documents/'.$attachment->getMinistrialDocument(),array('target' => '_blank')) ?></li>
				<?php endif; ?>
				<?php if(!is_null($attachment->getPerimeterAreaMap())): ?>
				<li><?php echo link_to('Maps(mining perimeter)','/uploads/documents/eia_documents/'.$attachment->getPerimeterAreaMap(),array('target' => '_blank')) ?></li>
				<?php endif; ?>
				<?php if(!is_null($attachment->getLocationAreaMap())): ?>
				<li><?php echo link_to('Maps(Project Components)','/uploads/documents/eia_documents/'.$attachment->getLocationAreaMap(),array('target' => '_blank')) ?></li>
				<?php endif; ?>
				<?php if(!is_null($attachment->getOtherSupportingDocument())): ?>
				<li><?php echo link_to('Other documents','/uploads/documents/eia_documents/'.$attachment->getOtherSupportingDocument(),array('target' => '_blank')) ?></li>
				<?php endif; ?>
			</ul>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span8" id="right-column">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-info-sign"></i> <?php echo __('PROJECT  DESCRIPTION') ?></h4>
			</div>
			<div class="widget-body">
				<?php foreach($descriptions as $description): ?>
				<div class="well">
				  <div class="alert alert-info">
				  <h4><?php echo __('NATURE OF THE PROJECT') ?></h4>
			      </div>
				
				<p><?php echo strtoupper(str_replace("_"," ",$description->getProjectNature())) ?></p>
				</div>
				<div class="well">
				  <div class="alert alert-info">
				  <h4><?php echo __('PROJECT OBJECTIVE') ?></h4>
			      </div>
				
				<p><?php echo html_entity_decode($description->getProjectObjective()) ?></p>
				</div>
				<div class="well">
				
				<div class="alert alert-info">
				  <h4><?php echo __('PROJECT COST') ?></h4>
			    </div>
				<p><?php echo __('Total Project Cost:') ?>&nbsp;<b><?php echo $description->getProjectTotalCost() ?></b></p>
				<p><?php echo __('Working capital:') ?>&nbsp;<b><?php echo $description->getProjectWorkingCapital() ?></b></p>
				</div>
				<div class="well">
					 <div class="alert alert-info">
					   <h4><?php echo __('LAND') ?></h4>
					 </div>
					<p><?php echo __('Total Land Area:') ?>&nbsp;<b><?php echo $description->getTotalLandArea() ?></b></p>
					<p><?php echo __('Existing land use:') ?>&nbsp;<?php echo $description->getExistingLandUse() ?></p>
				</div>
				<div class="well">
				
				<div class="alert alert-info">
					   <h4><?php echo __('PROJECT SITE:Description of the general location of the project site') ?></h4>
					 </div>
				<?php if($description->getSiteLocationDevelopedArea()): ?>
					<p><?php echo __('Developed Area') ?></p>
				<?php endif; ?>
				<?php if($description->getSiteLocationUndevelopedArea()): ?>
					<p><?php echo __('Underdeveloped Area') ?></p>
				<?php endif; ?>
				<?php if($description->getSiteLocationOther()): ?>
					<p><?php echo __('Other particulars:') ?>&nbsp;<?php echo $description->getSiteLocationOtherSpecify() ?></p>
				<?php endif; ?>
				</div>
				<div class="well">
				<div class="alert alert-info">
					   <h4><?php echo __('LAND USE CLASSIFICATION') ?></h4>
				</div>
				<ul>
				<?php if($description->getLandUseResidential()): ?>
					<li><?php echo __('Residential') ?></li>
				<?php endif; ?>
				<?php if($description->getLandUseIndustrial()): ?>
					<li><?php echo __('Industrial') ?></li>
				<?php endif; ?>
				<?php if($description->getLandUseTourism()): ?>
					<li><?php echo __('Tourism') ?></li>
				<?php endif; ?>
				<?php if($description->getLandUseCommercial()): ?>
					<li><?php echo __('Commercial') ?></li>
				<?php endif; ?>
				<?php if($description->getLandUseInstituational()): ?>
					<li><?php echo __('Institutional') ?></li>
				<?php endif; ?>
				<?php if($description->getLandUseOpenspace()): ?>
					<li><?php echo __('Open Space') ?></li>
				<?php endif; ?>
				<?php if($description->getLandUseOther()): ?>
					<p><?php echo __('Others:') ?>&nbsp;<?php echo $description->getLandUseOtherSpecify() ?></p>
				<?php endif; ?>
				</ul>
				</div>
				<div class="well">
				<div class="alert alert-info">
					   <h4><?php echo __('PROJECT COMPONENTS') ?></h4>
				</div>
				<p><?php echo $description->getProjectComponents() ?></p>
				</div>
				<!--  ----Project activities---- -->
				<div class="well">
				<div class="alert alert-info">
					   <h4><?php echo __('PROJECT ACTIVITIES DURING ALL PHASES') ?></h4>
				</div>
				<p><?php echo $description->getProjectActivities() ?></p>
				</div>
				<!---  ------- -->
				<div class="well">
					<div class="alert alert-info">
					   <h4><?php echo __('UTILITIES AND INFRASTRUCTURES') ?></h4>
				    </div>
					<div class="well">
					<div class="alert alert-info">
					   <h4><?php echo __('Water Supply') ?></h4>
				    </div>
						<div class="well">
						<div class="alert alert-info">
					   <h4><?php echo __('Demand:Estimated daily water requirement for the entire project') ?></h4>
				        </div>
						<ul>
						<li><?php echo __('Project Implementation:')?>&nbsp;<b><?php echo $description->getWaterDemandDuringImplementation() ?>m<sup>3</sup></b></li>
						<li><?php echo __('Operation:') ?>&nbsp;<b><?php echo $description->getWaterDemandDuringOperation() ?>m<sup>3</sup></b></li>
						</ul>
						</div>
						<div class="well">
						<div class="alert alert-info">
					      <h4><?php echo __('Supply') ?></h4>
				        </div>
						<?php if($description->getPublicWaterSupply()): ?>
						<p><?php echo __('Project is going to connect to an existing public water supply system.') ?></p>
						<?php endif; ?>
						<?php if(!$description->getPublicWaterSupply()): ?>
						<p><?php echo __('Project will not connect to an existing public water supply system')?></p>
						<?php endif; ?>
						</div>
					</div>
					<div class="well">
					    <div class="alert alert-info">
					      <h4><?php echo __('Water Treatment') ?></h4>
				        </div>
					<?php if($description->getWaterTreatment()): ?>
						<p><?php echo __('There is provision for water treatment') ?></p>
					<?php endif; ?>
					<?php if(!$description->getWaterTreatment()): ?>
						<p><?php echo __('There is no provision for water treatment') ?></p>
					<?php endif; ?>
					</div>
					<div class="well">
					
					     <div class="alert alert-info">
					      <h4><?php echo __('Sewage Disposal System') ?></h4>
				        </div>
					<ul>
					<?php if($description->getSewageSystemModern()): ?>
						<li><?php echo __('Modern waste water treatment plant') ?></li>
					<?php endif; ?>
					<?php if($description->getSewageSystemEcosan()): ?>
						<li><?php echo __('Ecosan toilets') ?></li>
					<?php endif; ?>
					<?php if($description->getSewageSystemBiogas()): ?>
						<li><?php echo __('Biogas plant') ?></li>
					<?php endif; ?>
					<?php if($description->getSewageSystemOther()): ?>
						<p><?php echo __('Others')?>:&nbsp;<?php echo $description->getSewageSystemOtherSpecify() ?></p>
					<?php endif; ?>
					</ul>
					<br/>
					<p><?php echo __('Sewage design capacity:') ?>&nbsp;<b><?php echo $description->getSewageSystemCapacity() ?></b></p>
					</div>
					<div class="well">
					<ul>
					
					    <div class="alert alert-info">
					      <h4><?php echo __('Power Supply') ?></h4>
				        </div>
					<?php if($description->getPowerSupplyLocalElectricity()): ?>
						<li><?php echo __('Local Electric EWSA grid:') ?>&nbsp;<b><?php echo $description->getPowerSupplyLocalElectricitySize() ?></b></li>
					<?php endif; ?>
					<?php if($description->getPowerSupplyOwnGenerator()): ?>
						<li><?php echo __('Own Generator:') ?>&nbsp;<b><?php echo $description->getPowerSupplyOwnGeneratorCapacity() ?></b></li>
					<?php endif; ?>
					<?php if($description->getPowerSupplyOther()): ?>
						<p><?php echo __('Others:') ?>&nbsp;<?php echo $description->getPowerSupplyOtherSpecify() ?></p>
					<?php endif; ?>
					</ul>
					</div>
				</div>
				<div class="well">
				
				        <div class="alert alert-info">
					      <h4><?php echo __('SOLID WASTE MANAGEMENT') ?></h4>
				        </div>
				<b><?php echo __('Disposal system:') ?></b><br/>
				<ul>
				<?php if($description->getSolidWasteEcological()): ?>
					<li><?php echo __('Ecological solid waste management') ?></li>
				<?php endif; ?>
				<?php if($description->getSolidWasteDumpsite()): ?>
					<li><?php echo __('Open dumpsite outside of the project site') ?></li>
				<?php endif; ?>
				<?php if($description->getSolidWasteMunicipal()): ?>
					<li><?php echo __('Municipal/City landfill area') ?></li>
				<?php endif; ?>
				<?php if($description->getSolidWasteOthers()): ?>
					<p><?php echo __('Other:') ?>&nbsp;<?php echo $description->getSolidWasteOthersSpecify() ?></p>
				<?php endif; ?>
				</ul>
				</div>
				<div class="well">
				<h4></h4>
				        <div class="alert alert-info">
					      <h4><?php echo __('MANPOWER AND EMPLOYMENT:Number of people employed by the project') ?></h4>
				        </div>
				<ul>
				<li><?php echo __('Design/Implementation:') ?>&nbsp;<b><?php echo $description->getManPowerEmploymentImplementation() ?></b></li>
				<li><?php echo __('Operation and maintenance:') ?>&nbsp;<b><?php echo $description->getManPowerEmploymentOperation() ?></b></li>
				</div>
				<div class="well">
				         <div class="alert alert-info">
					      <h4><?php echo __('Project Implementation duration:') ?></h4>
				        </div>
				<p><?php echo __('Period:') ?>&nbsp;<b><?php echo $description->getImplementationDuration() ?></b></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span8" id="right-column">
		<div class="widget">
			<div class="widget-title">
				       
					      <h4><i class="icon-info-sign"></i> <?php echo __('PROJECT SURROUNDINGS') ?></h4>
				       
			</div>
			<div class="widget-body">
			<div class="well well-large">
			
			            <div class="alert alert-info">
					      <h4><?php echo __('PHYSICAL ENVIRONMENT') ?></h4>
				        </div>
			<?php foreach($surroundings as $surrounding): ?>
				<div class="well">
				<p><?php echo __('General elevation of project area:') ?>&nbsp;<b><?php echo $surrounding->getProjectGeneralElevation() ?>masl</b></p>
				</div>
				<div class="well">
				 <div class="alert alert-info">
					      <h4><?php echo __('Soil erosion indications') ?></h4>
				        </div>
				<?php if($surrounding->getSoilErosion()): ?>
				<p><?php echo __('Area in site indicate soil erosion') ?></p>
					<b><?php echo __('Causes:') ?></b><br/>
					<ul>
					<?php if($surrounding->getSoilErosionHeavyRains()): ?>
					<li><?php echo __('Heavy rains') ?></li>
					<?php endif; ?>
					<?php if($surrounding->getSoilErosionUnstable()): ?>
					<li><?php echo __('Unstable slopes') ?></li>
					<?php endif; ?>
					<?php if($surrounding->getSoilErosionOthers()): ?>
					<p><?php echo __('Others:') ?>&nbsp;<?php echo $surrounding->getSoilErosionOthersSpecify() ?></p>
					<?php endif; ?>
					</ul>
				<?php endif; ?>
				<?php if(!$surrounding->getSoilErosion()): ?>
				<p><?php echo __('Area in site do not indicate soil erosion') ?></p>
				<?php endif; ?>
				</div>
				<div class="well">
				
				<div class="alert alert-info">
					      <h4><?php echo __('Existence of water bodies') ?></h4>
				        </div>
				<?php if($surrounding->getExistingWaterBody()): ?>
				<p> <?php echo __('Water bodies found near/ within the site') ?></p>
					<div class="well">
					<h4><?php echo __('Remarks') ?></h4>
					<p><?php echo $surrounding->getExistingWaterBodyRemark() ?></p>
					</div>
				<?php endif; ?>
				<?php if(!$surrounding->getExistingWaterBody()): ?>
				<p><?php echo __('No existing water bodies found near/ within the site') ?></p>
				<?php endif; ?>
				</div>
				<div class="well">
				        <div class="alert alert-info">
					      <h4><?php echo __('ACCESS ROAD GOING TO THE SITE') ?></h4>
				        </div>
				<?php if($surrounding->getAccessRoad()): ?>
				<p><?php echo __('Access road exists.Distance to site:') ?>&nbsp;<b><?php echo $surrounding->getAccessRoadDistance() ?>Km</b><p>
				<p><?php echo __('Type of road:') ?>&nbsp;<?php echo $surrounding->getAccessRoadType() ?></p>
				<?php endif; ?>
				<?php if(!$surrounding->getAccessRoad()): ?>
				<p><?php echo __('No access road to site') ?></p>
				<?php endif; ?>
				</div>
				<div class="well">
				
				 <div class="alert alert-info">
					      <h4><?php echo __('LAND USE:') ?></h4>
				        </div>
				<?php if($surrounding->getSiteConformApproval()): ?>
				<p><?php echo __('Conforms to the approves land use plan of the city/District') ?></p>
					<div class="well">
					<h4><?php echo __('Remarks') ?></h4>
					<p><?php echo $surrounding->getSiteConformRemark() ?></p>
					</div>
				<?php endif; ?>
				<?php if(!$surrounding->getSiteConformApproval()): ?>
				<p><?php echo __('Does not conform to the approves land use plan of the city/District') ?></p>
					<div class="well">
					<h4><?php echo __('Remarks') ?></h4>
					<p><?php echo $surrounding->getSiteConformRemark() ?></p>
					</div>
				<?php endif; ?>
				</div>
				<div class="well">
				
				 <div class="alert alert-info">
					      <h4><?php echo __('STRUCTURES AND DEVELOPMENTS:') ?></h4>
				        </div>
				<?php if($surrounding->getSiteExistingStructure()): ?>
				<p><?php echo __('Existence of structures/developments around the site') ?></p>
					<div class="well">
					<h4><?php echo __('Remarks') ?></h4>
					<p><?php echo $surrounding->getSiteExistingRemark() ?></p>
					</div>
				<?php endif; ?>
				<?php if(!$surrounding->getSiteExistingStructure()): ?>
				<p><?php echo __('No existing stuctures/developments around the site') ?></p>
				<?php endif; ?>
				</div>
				<div class="well">
				        <div class="alert alert-info">
					      <h4><?php echo __('PRESENT LAND USE:') ?></h4>
				        </div>
				<ul>
				<?php if($surrounding->getLandUseAgriculture()): ?>
				<li><?php echo __('Agricultural land') ?></li>
				<?php endif; ?>
				<?php if($surrounding->getLandUseGrassland()): ?>
				<li><?php echo __('Grassland') ?></li>
				<?php endif; ?>
				<?php if($surrounding->getLandUseBuiltup()): ?>
				<li><?php echo __('Built-up') ?></li>
				<?php endif; ?>
				<?php if($surrounding->getLandUseMarshland()): ?>
				<li><?php echo __('Marshland') ?></li>
				<?php endif; ?>
				<?php if($surrounding->getLandUseOther()): ?>
				<p><?php echo __('Others:') ?>&nbsp;<?php echo $surrounding->getLandUseOtherSpecify() ?></p>
				<?php endif; ?>
				</ul>
				</div>
			</div>
			<div class="well well-large">
			    <div class="alert alert-info">
					      <h4><?php echo __('BIOLOGICAL ENVIRONMENT') ?></h4>
				        </div>
				<div class="well">
				<h4><?php echo __('Vegetation:') ?></h4>
				<?php if($surrounding->getExistingTrees()): ?>
				<p><?php echo __('Existence of trees and other types of vegetation in the site') ?></p>
				<div class="well">
				<h4><?php echo __('Examples of vegetation:') ?></h4>
				<p><?php echo $surrounding->getExistingTreesRemark() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$surrounding->getExistingTrees()): ?>
				<p><?php echo __('No existence of trees and other types of vegetation in the site') ?></p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4><?php echo __('Birds and Wildlife:') ?></h4>
				<?php if($surrounding->getWildlifeExisting()): ?>
				<p><?php echo __('Existence of birds and other wildlife found in the site') ?></p>
				<div class="well">
				<h4><?php echo __('Remarks') ?></h4>
				<p><?php echo $surrounding->getWildlifeExistingRemark() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$surrounding->getWildlifeExisting()): ?>
				<p><?php echo __('No existence of birds and other wildlife found in the site') ?></p>
				<div class="well">
				<h4><?php echo __('Remarks') ?></h4>
				<p><?php echo $surrounding->getWildlifeExistingRemark() ?></p>
				</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4><?php echo __('Fishery resources') ?></h4>
				<?php if($surrounding->getFisheryExisting()): ?>
				<p><?php echo __('Existence of fishery resources in water bodies found near/within the site') ?></p>
				<div class="well">
				<h4><?php echo __('Remarks') ?></h4>
				<p><?php echo $surrounding->getFisheryExistingRemark() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$surrounding->getFisheryExisting()): ?>
				<p><?php echo __('No existence of fishery resources in water bodies found near/within the site') ?></p>
				<div class="well">
				<h4><?php echo __('Remarks')?></h4>
				<p><?php echo $surrounding->getFisheryExistingRemark() ?></p>
				</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<div class="alert alert-info">
					      <h4><?php echo __('Watershed/Forest reservation:') ?></h4>
				        </div>
				<?php if($surrounding->getWatershedExisting()): ?>
				<p><?php echo __('Site is near or within a watershed/forest reservation') ?></p>
					<?php if(!is_null($surrounding->getWatershedNearDistance())): ?>
					<blockquote><?php echo ('Watershed/forest reservation area near site. Distance from site:')?>&nbsp;<b><?php echo $surrounding->getWatershedNearDistance() ?>&nbsp;<?php echo $surrounding->getWatershedNearDistanceUnits() ?></b></blockquote>
					<?php endif; ?>
					<?php if(!is_null($surrounding->getWatershedWithinName())): ?>
					<blockquote><?php echo __('Watershed/forest reservation area is within') ?></blockquote>
						<div class="well">
						<h4><?php echo __('Watershed/forest reservation area names:')?></h4>
						<p><?php echo $surrounding->getWatershedWithinName() ?></p>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4><div class="alert alert-info"><?php echo __('Examples of species found within/around the site:')?></div></h4>
				<?php foreach($surrounding->getEIAProjectSurroundingSpecies() as $species): ?>
				<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th><?php echo __('Birds and other wildlife') ?></th>
						<th><?php echo __('Trees and other vegetation') ?></th>
						<th><?php echo __('Fishery resources') ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $species->getBirdsAnimals() ?></td>
						<td><?php echo $species->getTreesVegetation() ?></td>
						<td><?php echo $species->getFisheries() ?></td>
					</tr>
				</tbody>
				</table>
				<?php endforeach; ?>
				</div>
			</div>
			<?php endforeach; ?>
			<div class="widget">
			<div class="widget-title">
					      <h4><?php echo __('SOCIO-ECONOMIC ENVIRONMENT') ?></h4>
				        </div>
			<?php foreach($economics as $economic): ?>
				<div class="well">
				<h4><?php echo __('Settlements:') ?></h4>
				<?php if($economic->getExistingSettlements()): ?>
				<p><?php echo __('Existing settlements in the project')?></p>
				<div class="well">
				<h4><?php echo __('Remarks') ?></h4>
				<p><?php echo $economic->getExistingSettlementsRemark() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$economic->getExistingSettlements()): ?>
				<p><?php echo __('No existing settlements in the project')?></p>
				<div class="well">
				<h4><?php echo __('Remarks') ?></h4>
				<p><?php echo $economic->getExistingSettlementsRemark() ?></p>
				</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<?php if(!is_null($economic->getAverageFamilySize())): ?>
				<h4><?php echo __('Family:') ?></h4>
				<p><?php echo __('Average family size:')?>&nbsp;<b><?php echo $economic->getAverageFamilySize() ?></b></p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4><?php echo __('Sources of livelihood:') ?></h4>
				<ul>
				<?php if($economic->getLivelihoodFarming()): ?>
					<li><?php echo __('Farming')?></li>
				<?php endif; ?>
				<?php if($economic->getLivelihoodFishing()): ?>
					<li><?php echo __('Fishing')?></li>
				<?php endif; ?>
				<?php if($economic->getLivelihoodVending()): ?>
					<li><?php echo __('Vending') ?></li>
				<?php endif; ?>
				<?php if($economic->getLivelihoodOthers()): ?>
					<p><?php echo __('Others:')?>&nbsp;<?php echo $economic->getLivelihoodOthersSpecify() ?></p>
				<?php endif; ?>
				</ul>
				<?php if(!is_null($economic->getLivelihoodRemarks())): ?>
					<div class="well">
					<h4><?php echo __('Remarks:') ?></h4>
					<p><?php echo $economic->getLivelihoodRemarks() ?></p>
					</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4><?php echo __('Local organizations:') ?></h4>
				
				<?php if($economic->getLocalOrganization()): ?>
				<p><?php echo __('Existence of local organizations in the area')?></p>
				<div class="well">
					<h4><?php echo __('Organizations:') ?></h4>
					<p><?php echo $economic->getLocalOrganizationDescription() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$economic->getLocalOrganization()): ?>
				<p><?php echo __('No existence of local organizations in the area')?></p>
				<?php endif; ?>
				</div>
				<div class="well">
				
				<div class="alert alert-info">
					      <h4><?php echo __('SOCIAL INFRASTRUCTURES:') ?></h4>
				        </div>
				<?php if($economic->getSocialInfrastructures()): ?>
					<p><?php echo __('Existence of social infrastructures in the project site')?></p>
					<b><?php echo __('Available social infrastructures:')?></b>
					<ul>
					<?php if($economic->getSocialSchools()): ?>
					<li><?php echo __('Schools') ?></li>
					<?php endif; ?>
					<?php if($economic->getSocialHealthCenters()): ?>
					<li><?php echo __('Health centers') ?></li>
					<?php endif; ?>
					<?php if($economic->getSocialHospital()): ?>
					<li><?php echo __('Hospitals') ?></li>
					<?php endif; ?>
					<?php if($economic->getSocialTransportation()): ?>
					<li><?php echo __('Transportation') ?></li>
					<?php endif; ?>
					<?php if($economic->getSocialCommunication()): ?>
					<li><?php echo __('Communication') ?></li>
					<?php endif; ?>
					<?php if($economic->getSocialChurches()): ?>
					<li><?php echo __('Churches/Chapel') ?></li>
					<?php endif; ?>
					<?php if($economic->getSocialRoads()): ?>
					<li><?php echo __('Roads') ?></li>
					<?php endif; ?>
					<?php if($economic->getSocialOthers()): ?>
					<p><?php echo __('Others:') ?>&nbsp;<?php echo $economic->getSocialOthersSpecify() ?></p>
					<?php endif; ?>
					</ul>
				<?php endif; ?>
				<?php if(!$economic->getSocialInfrastructures()): ?>
				<p><?php echo __('No existence of social infrastructures in the project site')?></p>
				<?php endif; ?>
				</div>
			<?php endforeach; ?>	
			</div>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span8" id="right-column">
		<div class="widget">
			<div class="widget-title">
					      <h4><i class="icon-info-sign"></i> <?php echo __('PREDICTED IMPACT AND PROPOSED ENHANCEMENT/MITIGATION MEASURES') ?></h4>  
			</div>
			<div class="widget-body">
			<?php foreach($impacts as $impact): ?>
			<div class="widget">
			      <div class="widget-title">
					      <h4><i class="icon-columns"></i><?php echo __('Project design and implementation phase') ?></h4>
				        </div>
					<div class="well">
					<h4><?php echo __('Impact -- dust') ?></h4>
					<?php if($impact->getDustGeneration()): ?>
					<p><?php echo __('Increase in dust generation due to clearing,civil works and earthmoving activities</p>
					<b>Proposed enhancement:') ?></b>
						<ul>
						<?php if($impact->getDustGenerationWatering()): ?>
						<li><?php echo __('Regular watering of unpaved roads or exposed soils/ground') ?></li>
						<?php endif; ?>
						<?php if($impact->getDustGenerationRemoveSoil()): ?>
						<li><?php echo __('Remove soil /mud from tires of trucks and equipment before leaving the area') ?></li>
						<?php endif; ?>
						<?php if($impact->getDustGenerationHaulingTrucks()): ?>
						<li><?php echo __('Hauling trucks should be covered with canvass or any equivalent materials') ?></li>
						<?php endif; ?>
						<?php if($impact->getDustGenerationTemporaryFence()): ?>
						<li><?php echo __('Set-up temporary fence around the construction area') ?></li>
						<?php endif; ?>
						</ul>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getDustGenerationRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getDustGeneration()): ?>
					<p><?php echo __('No increase in dust generation due to clearing,civil works and earthmoving activities') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getDustGenerationRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact -- top soil') ?></h4>
					<?php if($impact->getSoilRemoval()): ?>
					<p><?php echo __('Top soil removal and loss due earthmoving activities, transport, access road construction') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getSoilRemovalMitigateStockpile()): ?>
					<li><?php echo __('Stockpile the top soil in a safe place and use as final grading material or final layer')?></li>
					<?php endif; ?>
					<?php if($impact->getSoilRemovalMitigateRevegetate()): ?>
					<li><?php echo __('Rip-rap or re-vegetate  the area') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks')?></h4>
						<p><?php echo $impact->getSoilRemovalRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getSoilRemoval()): ?>
					<p><?php echo __('No top soil removal and loss due earthmoving activities, transport, access road construction')?></p>
					<div class="well">
						<h4><?php echo __('Remarks:')?></h4>
						<p><?php echo $impact->getSoilRemovalRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- erosion')?></h4>
					<?php if($impact->getErosionFromCuts()): ?>
					<p><?php echo __('Erosion from exposed  cuts and landslides  due to earthmoving and excavation activities')?></p>
					<b><?php echo __('Proposed enhancement:')?></b>
					<ul>
					<?php if($impact->getErosionMitigateConstructDryseason()): ?>
					<li><?php echo __('Conduct construction activities during dry season')?></li>
					<?php endif; ?>
					<?php if($impact->getErosionMitigateAvoidExposure()): ?>
					<li><?php echo __('Avoid long exposure of opened cuts')?></li>
					<?php endif; ?>
					<?php if($impact->getErosionMitigateBarrierNets()): ?>
					<li><?php echo __('Installation of barrier nets')?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getErosionRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getErosionFromCuts()): ?>
					<p><?php echo __('No erosion from exposed  cuts and landslides  due to earthmoving and excavation activities')?></p>
					<div class="well">
						<h4><?php echo __('Remarks:')?></h4>
						<p><?php echo $impact->getErosionRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- sedimentation')?></h4>
					<?php if($impact->getSedimentation()): ?>
					<p><?php echo __('Sedimentation/siltation of drainage or waterways from unconfined stockpiles of soil and other materials') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getSedimentationMitigateSiltTrap()): ?>
					<li><?php echo __('Set-up temporary silt trap/ponds to prevent siltation') ?></li>
					<?php endif; ?>
					<?php if($impact->getSedimentationMitigateProperStockpilling()): ?>
					<li><?php echo __('Proper stockpiling of spoils(on flat areas and away from drainage routes)')?></li>
					<?php endif; ?>
					<?php if($impact->getSedimentationMitigateFillingMaterials()): ?>
					<li><?php echo __('Spoils generated from civil works be disposed as filling materials') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getSedimentationRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getSedimentation()): ?>
					<p><?php echo __('No erosion from exposed  cuts and landslides  due to earthmoving and excavation activities') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getSedimentationRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- pollution') ?></h4>
					<?php if($impact->getPollution()): ?>
					<p><?php echo __('Pollution of nearby water body due to improper disposal of construction wastes') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getPollutionMitigateTemporaryDisposal()): ?>
					<li><?php echo __('Set-up temporary disposal mechanism within the construction area and properly dispose the generated solid wastes') ?></li>
					<?php endif; ?>
					<?php if($impact->getPollutionMitigateToiletFacilities()): ?>
					<li><?php echo __('Set up proper and adequate toilet facilities') ?></li>
					<?php endif; ?>
					<?php if($impact->getPollutionMitigateContractObserve()): ?>
					<li><?php echo __('Strictly require the contractor and its workers to observe proper waste disposal and proper sanitation')?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getPollutionRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getPollution()): ?>
					<p><?php echo __('No pollution of nearby water body due to improper disposal of construction wastes')?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getPollutionRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well"> 
					<h4><?php echo __('Impact --- vegetation') ?></h4>
					<?php if($impact->getVegetationLoss()): ?>
					<p><?php echo __('Loss of vegetation due to land clearing') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getVegetationLimitClearing()): ?>
					<li><?php echo __('Limit land clearing as much as possible') ?></li>
					<?php endif; ?>
					<?php if($impact->getVegetationProvideClearing()): ?>
					<li><?php echo __('Provide temporary fencing to vegetation that will be retained') ?></li>
					<?php endif; ?>
					<?php if($impact->getVegetationUseMarkers()): ?>
					<li><?php echo __('Use of markers and fences to direct heavy equipment traffic in the construction site and avoid damage to plants') ?></li>
					<?php endif; ?>
					<?php if($impact->getVegetationReplant()): ?>
					<li><?php echo __('Re-plant/ plant indigenous tree species and ornamental plants') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getVegetationRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getVegetationLoss()): ?>
					<p><?php echo __('No loss of vegetation due to land clearing') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getVegetationRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- wildlife') ?></h4>
					<?php if($impact->getDisturbance()): ?>
					<p><?php echo __('Disturbance or loss of wildlife within the influence area due to noise and other construction activities')?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getDisturbanceReestablish()): ?>
					<li><?php echo __('Re-establish or simulate the habitat of affected wildlife in another suitable area') ?></li>
					<?php endif; ?>
					<?php if($impact->getDisturbanceSchedule()): ?>
					<li><?php echo __('Schedule noisy construction activities during day time') ?></li>
					<?php endif; ?>
					<?php if($impact->getDisturbanceMaintenance()): ?>
					<li><?php echo __('Undertake proper maintenance of equipment and use mufflers') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getDisturbanceRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getDisturbance()): ?>
					<p><?php echo __('No disturbance or loss of wildlife within the influence area due to noise and other construction activities') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getDisturbanceRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- noise:') ?></h4>
					<?php if($impact->getNoiseGeneration()): ?>
					<p><?php echo __('Noise generation that can affect the nearby resident') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getNosieGenerationSchedule()): ?>
					<li><?php echo __('Schedule noisy construction activities during day time')?></li>
					<?php endif; ?>
					<?php if($impact->getNoiseGenerationUndertake()): ?>
					<li><?php echo __('Undertake proper maintenance of equipment and use mufflers') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getNoiseGenerationRemark() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getNoiseGeneration()): ?>
					<p><?php echo __('No noise generation that can affect the nearby resident') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getNoiseGenerationRemark() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- employment') ?></h4>
					<?php if($impact->getGenerationEmployment()): ?>
					<p><?php echo __('Generation of employment') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getGenerationEmploymentHiring()): ?>
					<li><?php echo __('Hiring priority shall be given to qualified local residents') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getGenerationEmploymentRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getGenerationEmployment()): ?>
					<p><?php echo __('No generation of employment') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getGenerationEmploymentRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- right of way') ?></h4>
					<?php if($impact->getConflicts()): ?>
					<p><?php echo __('Conflicts in right of way') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getConflictConslutation()): ?>
					<li><?php echo __('Conduct consultation and settle agreements before finalizing detailed design') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getConflictRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getConflicts()): ?>
					<p><?php echo __('No conflicts in right of way') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getConflictRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- traffic') ?></h4>
					<?php if($impact->getTrafficCongestion()): ?>
					<p><?php echo __('Increased traffic and possible congestion') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getTrafficRulesAdherance()): ?>
					<li><?php echo __('Strict enforcement of traffic rules and regulations') ?></li>
					<?php endif; ?>
					<?php if($impact->getTrafficeAidProvision()): ?>
					<li><?php echo __('Proponent should provide traffic aid during peak hours') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getTrafficCongestionRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getTrafficCongestion()): ?>
					<p><?php echo __('No increased traffic and possible congestion') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getTrafficCongestionRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- crime and accidents:') ?></h4>
					<?php if($impact->getCrimesAccidents()): ?>
					<p><?php echo __('Increase in the incidence of crime and accidents') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impact->getCrimesAccidentsSafetyRules()): ?>
					<li><?php echo ('Strictly require the contractor and its  workers to follow safety rules and regulations in the construction and in the locality (in coordination with local  authorities)')?> </li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impact->getCrimeAccidentsRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getCrimesAccidents()): ?>
					<p><?php echo __('No increase in the incidence of crime and accidents') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impact->getCrimeAccidentsRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
			</div>
			<?php endforeach; ?>
			<div class="widget">
			             <div class="widget-title">
					      <h4><i class="icon-columns"></i><?php echo __('OPERATION PHASE') ?></h4>
				        </div>
						<div class ="widget-body">
				<?php foreach($impactsOperation as $impactOperation): ?>
					<div class="well">
					<h4><?php echo __('Impact --- domestic effluents') ?></h4>
					<?php if($impactOperation->getDomesticInfluence()): ?>
					<p><?php echo __('Generation of domestic effluents') ?></p>
					<b><?php echo __('Proposed enhancement:') ?></b>
					<ul>
					<?php if($impactOperation->getDomesticWastewaterTreatment()): ?>
					<li><?php echo __('Provision of adequate wastewater treatment facilities') ?></li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4><?php echo __('Remarks') ?></h4>
						<p><?php echo $impactOperation->getDomesticInfluenceRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impactOperation->getDomesticInfluence()): ?>
					<p><?php echo __('No generation of domestic effluents') ?></p>
					<div class="well">
						<h4><?php echo __('Remarks:') ?></h4>
						<p><?php echo $impactOperation->getDomesticInfluenceRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4><?php echo __('Impact --- soild waste') ?></h4>
					<?php if($impactOperation->getSolidWastes()): ?>
						<p><?php echo __('Generation of solid wastes') ?></p>
						<b><?php echo __('Proposed enhancement:')?></b>
							<ul>
							<?php if($impactOperation->getSolidWastesSegregation()): ?>
							<li><?php echo __('Segregation of recyclable materials') ?></li>
							<?php endif; ?>
							<?php if($impactOperation->getSolidWastesProperCollection()): ?>
							<li><?php echo __('Proper collection and disposal of solid wastes') ?></li>
							<?php endif; ?>
							<?php if($impactOperation->getSolidWastesProperHousekeeping()): ?>
							<li><?php echo __('Proper housekeeping and waste minimization') ?></li>
							<?php endif; ?>
							</ul>
							<div class="well">
								<h4><?php echo __('Remarks') ?></h4>
								<p><?php echo $impactOperation->getSolidWastesRemarks() ?></p>
							</div>
						<?php endif; ?>
						<?php if(!$impactOperation->getSolidWastes()): ?>
						<p><?php echo __('No generation of solid wastes') ?></p>
							<div class="well">
								<h4><?php echo __('Remarks:') ?></h4>
								<p><?php echo $impactOperation->getSolidWastesRemarks() ?></p>
							</div>
						<?php endif; ?>
					</div>
					<div class="well">
						<h4><?php echo __('Impact --- traffic') ?></h4>
						<?php if($impactOperation->getIncreasedTraffic()): ?>
						<p><?php echo __('Increased traffic and possible congestion as well as increase risk of vehicular and related accidents') ?></p>
						<b><?php echo __('Proposed enhancement:') ?></b>
							<ul>
							<?php if($impactOperation->getIncreasedTrafficRulesAdhere()): ?>
							<li><?php echo __('Strict enforcement of traffic rules and  regulations') ?></li>
							<?php endif; ?>
							<?php if($impactOperation->getIncreasedTrafficSignables()): ?>
							<li><?php echo __('Placement of signage and warnings in appropriate places') ?></li>
							<?php endif; ?>
							</ul>
							<div class="well">
								<h4><?php echo __('Remarks') ?></h4>
								<p><?php echo $impactOperation->getIncreasedTrafficeRemarks() ?></p>
							</div>
						<?php endif; ?>
						<?php if(!$impactOperation->getIncreasedTraffic()): ?>
						<p><?php echo __('No increased traffic and possible congestion as well as increase risk of vehicular and related accidents') ?></p>
							<div class="well">
								<h4><?php echo __('Remarks:') ?></h4>
								<p><?php echo $impactOperation->getIncreasedTrafficeRemarks() ?></p>
							</div>
						<?php endif; ?>
					</div>
					<div class="well">
						<h4><?php echo __('Impact --- fire') ?></h4>
						<?php if($impactOperation->getFireRisk()): ?>
						<p><?php echo __('Risk of fire') ?></p>
						<b><?php echo __('Proposed enhancement:') ?></b>
							<ul>
							<?php if($impactOperation->getFireRiskExtinguishers()): ?>
							<li><?php echo __('Fire extinguishers in good working condition installed in each corner') ?></li>
							<?php endif; ?>
							<?php if($impactOperation->getFireRiskExitStairs()): ?>
							<li><?php echo __('Exit stairs provided and shown on plans clearly posted at entrance') ?></li>
							<?php endif; ?>
							</ul>
							<div class="well">
								<h4><?php echo __('Remarks') ?></h4>
								<p><?php echo $impactOperation->getFireRiskRemarks() ?></p>
							</div>
						<?php endif; ?>
						<?php if(!$impactOperation->getFireRisk()): ?>
						<p><?php echo __('No risk of fire') ?></p>
							<div class="well">
								<h4><?php echo __('Remarks:') ?></h4>
								<p><?php echo $impactOperation->getFireRiskRemarks() ?></p>
							</div>
						<?php endif; ?>
					</div>
			
			<?php endforeach; ?>
			 </div>
			</div>
			</div>
		</div>
	</div>
</div>
 <div id="widget-resubmission" class="modal hide">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3><?php echo __('Request Resubmission') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('Your are about to request for a resubmission of the clients data')?>.</p>
		<p><?php echo __('If you are sure about you decision, then click continue or just cancel') ?></p>
		<?php echo button_to('continue','eiaDataAdmin/resubmission?id='.$detail->getEiaprojectId()) ?>
	</div>
	<div class="modal-footer">
		<button data-dismiss="modal" class="close" type="button"><?php echo __('Cancel') ?></button>
	</div>
</div>
<div id="widget-confirm" class="modal hide fade">
	<div class="modal-header">
		<h3><?php echo __('Confirm Request') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('This confirms you have read and analysed the application and you are satisfied with the information provided by the applicant') ?>.</p>
		<p><?php echo __('Info applicant to recommend an appropriate date for the site visit') ?></p>
		<p><?php echo button_to('Info Applicant','eiaDataAdmin/message?applicant='.$applicant->getUsername(),array('class' => 'btn btn-primary')) ?></p>
	<?php //echo mail_to($applicant->getEmailAddress(),'Email Applicant',array('class' =>'btn btn-inverse')) ?>
		<p><?php echo __('Proceed to allocate a day for the site visit in which the applicant has made themselves available or a representative available') ?>.</p>
	</div>
	<div class="modal-footer">
		<button data-dismiss="modal" class="btn" aria-hidden="true"><?php echo __('Close') ?></button>
		<?php echo button_to('Proceed','eiaDataAdmin/siteVisit?id='.$detail->getEiaprojectId(),array('class' => 'btn btn-success')) ?>
		
	</div>
</div>
<div id="widget-reject" class="modal hide">
	<div class="modal-header">
		<h3><?php echo __('Reject Application') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('You are about to reject the application') ?>.</p> 
		<p><?php echo __('Proceed to specify the reasons for this action') ?>.</p>
		<?php echo button_to('Proceed','eiaDataAdmin/reject?id='.$detail->getEiaprojectId(),array('class' => 'btn btn-success')) ?>
	</div>
	<div class="modal-footer">
		<button data-dismiss="modal" class="close" type="button"><?php echo __('X') ?></button>
	</div>
</div>

<div class="form-actions">
	<a href="#widget-resubmission" data-toggle="modal">
	<button type="button" class="btn btn-inverse"><?php echo __('Request Resubmission') ?></button></a>
	<a href="#widget-confirm" data-toggle="modal">
	<button type="button" class="btn btn-success"><?php echo __('Site Visit') ?></button></a>
</div>