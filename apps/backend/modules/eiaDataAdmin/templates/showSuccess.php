<div class="row-fluid">
	<div class="span8" id="right-column">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-reorder"></i><?php echo __('Project General Infomation') ?></h4>
			</div>
			<div class="widget-body">
				<p class="lead muted"><?php echo __('Project Title') ?>:&nbsp;<?php echo $detail->getEIAProjectDetail()->getProjectTitle() ?></p>
				<div class="well">
				<h4><?php echo __('Project Location') ?></h4>
				<?php if(!is_null($detail->getEIAProjectDetail()->getProjectPlotNumber())): ?>
				<p><?php echo __('Plot Number') ?>: &nbsp;<?php echo $detail->getEIAProjectDetail()->getProjectPlotNumber() ?></p>
				<?php endif; ?>
				<?php if(!is_null($detail->getEIAProjectDetail()->getVillage())): ?>
				<p><?php echo __('Village') ?>:&nbsp;<?php echo strtoupper($detail->getEIAProjectDetail()->getVillage()) ?></p>
				<?php endif; ?>
				<?php if(!is_null($detail->getEIAProjectDetail()->getCell())): ?>
				<p><?php echo __('Cell') ?>:&nbsp;<?php echo strtoupper($detail->getEIAProjectDetail()->getCell()) ?></p>
				<?php endif; ?>
				<p><?php echo __('Sector') ?>:&nbsp;<?php echo strtoupper($detail->getEIAProjectDetail()->getSector()) ?></p>
				<p><?php echo __('District') ?>:&nbsp;<?php echo strtoupper($detail->getEIAProjectDetail()->getDistrict()) ?></p>
				<p><?php echo __('Province') ?>:&nbsp;<?php echo strtoupper(str_replace("_"," ",$detail->getEIAProjectDetail()->getProvince())) ?></p>
				</div>
				<div class="well">
				<h4><?php echo __('Project Developer') ?></h4>
				<?php foreach($developers as $developer):?>
				<p><?php echo __('Developer') ?>:&nbsp;<?php echo $developer->getDeveloperName() ?></p>
				<p><?php echo __('Contant Person') ?>:&nbsp;<?php echo $developer->getContactPerson() ?></p>
				<?php if(!is_null($developer->getAddress())): ?>
				<p><?php echo __('Address') ?>:&nbsp;<?php echo $developer->getAddress() ?></p>
				<?php endif; ?>
				<?php if(!is_null($developer->getTelephone())): ?>
				<p><?php echo __('Telephone') ?>:&nbsp;<?php echo $developer->getTelephone() ?></p>
				<?php endif; ?>
				<?php if(!is_null($developer->getMobilePhone())): ?>
				<p><?php echo __('Mobile Phone') ?>:&nbsp;<?php echo $developer->getMobilePhone() ?></p>
				<?php endif; ?>
				<p><?php echo __('E-mail') ?>:&nbsp;<?php echo $developer->getEmailAddress() ?></p>
				<p><?php echo __('Social Network') ?>:&nbsp;<?php echo $developer->getCommunicationMode() ?></p>
				<?php if(!is_null($developer->getCommunicationMode())): ?>
				<p><?php echo __('Account name') ?>:&nbsp;<?php echo $developer->getSocialMediaAccount() ?></p>
				<?php endif; ?>
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
				<h4><i class="icon-reorder"></i>Project Description</h4>
			</div>
			<div class="widget-body">
				<?php foreach($descriptions as $description): ?>
				<div class="well">
				<h4>Nature of the project</h4>
				<p><?php echo strtoupper(str_replace("_"," ",$description->getProjectNature())) ?></p>
				</div>
				<div class="well">
				<h4>Project Objective</h4>
				<p><?php echo $description->getProjectObjective() ?></p>
				</div>
				<div class="well">
				<h4>Project Cost</h4>
				<p>Total Project Cost:&nbsp;<b><?php echo $description->getProjectTotalCost() ?></b></p>
				<p>Working capital:&nbsp;<b><?php echo $description->getProjectWorkingCapital() ?></b></p>
				</div>
				<div class="well">
				<h4>Land</h4>
				<p>Total Land Area:&nbsp;<b><?php echo $description->getTotalLandArea() ?></b></p>
				<p>Existing land use:&nbsp;<?php echo $description->getExistingLandUse() ?></p>
				</div>
				<div class="well">
				<h4>Project Site:Description of the general location of the project site</h4>
				<?php if($description->getSiteLocationDevelopedArea()): ?>
					<p>Developed Area</p>
				<?php endif; ?>
				<?php if($description->getSiteLocationUndevelopedArea()): ?>
					<p>Underdeveloped Area</p>
				<?php endif; ?>
				<?php if($description->getSiteLocationOther()): ?>
					<p>Other particulars:&nbsp;<?php echo $description->getSiteLocationOtherSpecify() ?></p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Land use classification</h4>
				<ul>
				<?php if($description->getLandUseResidential()): ?>
					<li>Residential</li>
				<?php endif; ?>
				<?php if($description->getLandUseIndustrial()): ?>
					<li>Industrial</li>
				<?php endif; ?>
				<?php if($description->getLandUseTourism()): ?>
					<li>Tourism</li>
				<?php endif; ?>
				<?php if($description->getLandUseCommercial()): ?>
					<li>Commercial</li>
				<?php endif; ?>
				<?php if($description->getLandUseInstituational()): ?>
					<li>Institutional</li>
				<?php endif; ?>
				<?php if($description->getLandUseOpenspace()): ?>
					<li>Open Space</li>
				<?php endif; ?>
				<?php if($description->getLandUseOther()): ?>
					<p>Others:&nbsp;<?php echo $description->getLandUseOtherSpecify() ?></p>
				<?php endif; ?>
				</ul>
				</div>
				<div class="well">
				<h4>Project Componenets</h4>
				<p><?php echo $description->getProjectComponents() ?></p>
				</div>
				<!--  ----Project activities---- -->
				<div class="well">
				<h4>Project activities during all phases</h4>
				<p><?php echo $description->getProjectActivities() ?></p>
				</div>
				<!---  ------- -->
				<div class="well">
					<h4>Utilities and Infrastructures</h4>
					<div class="well">
					<h4>Water Supply</h4>
						<div class="well">
						<h4>Demand:Estimated daily water requirement for the entire project</h4>
						<ul>
						<li>Project Implementation:&nbsp;<b><?php echo $description->getWaterDemandDuringImplementation() ?>m<sup>3</sup></b></li>
						<li>Operation:&nbsp;<b><?php echo $description->getWaterDemandDuringOperation() ?>m<sup>3</sup></b></li>
						</ul>
						</div>
						<div class="well">
						<h4>Supply</h4>
						<?php if($description->getPublicWaterSupply()): ?>
						<p>Project is going to connect to an existing public water supply system.</p>
						<?php endif; ?>
						<?php if(!$description->getPublicWaterSupply()): ?>
						<p>Project will not connect to an existing public water supply system</p>
						<?php endif; ?>
						</div>
					</div>
					<div class="well">
					<h4>Water Treatment</h4>
					<?php if($description->getWaterTreatment()): ?>
						<p>There is provision for water treatment</p>
					<?php endif; ?>
					<?php if(!$description->getWaterTreatment()): ?>
						<p>There is no provision for water treatment</p>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Sewage Disposal System</h4>
					<ul>
					<?php if($description->getSewageSystemModern()): ?>
						<li>Modern waste water treatment plant</li>
					<?php endif; ?>
					<?php if($description->getSewageSystemEcosan()): ?>
						<li>Ecosan toilets</li>
					<?php endif; ?>
					<?php if($description->getSewageSystemBiogas()): ?>
						<li>Biogas plant</li>
					<?php endif; ?>
					<?php if($description->getSewageSystemOther()): ?>
						<p>Others:&nbsp;<?php echo $description->getSewageSystemOtherSpecify() ?></p>
					<?php endif; ?>
					</ul>
					<br/>
					<p>Sewage design capacity:&nbsp;<b><?php echo $description->getSewageSystemCapacity() ?></b></p>
					</div>
					<div class="well">
					<ul>
					<h4>Power Supply</h4>
					<?php if($description->getPowerSupplyLocalElectricity()): ?>
						<li>Local Electric EWSA grid:&nbsp;<b><?php echo $description->getPowerSupplyLocalElectricitySize() ?></b></li>
					<?php endif; ?>
					<?php if($description->getPowerSupplyOwnGenerator()): ?>
						<li>Own Generator:&nbsp;<b><?php echo $description->getPowerSupplyOwnGeneratorCapacity() ?></b></li>
					<?php endif; ?>
					<?php if($description->getPowerSupplyOther()): ?>
						<p>Others:&nbsp;<?php echo $description->getPowerSupplyOtherSpecify() ?></p>
					<?php endif; ?>
					</ul>
					</div>
				</div>
				<div class="well">
				<h4>Solid waste management</h4>
				<b>Disposal system:</b><br/>
				<ul>
				<?php if($description->getSolidWasteEcological()): ?>
					<li>Ecological solid waste management</li>
				<?php endif; ?>
				<?php if($description->getSolidWasteDumpsite()): ?>
					<li>Open dumpsite outside of the project site</li>
				<?php endif; ?>
				<?php if($description->getSolidWasteMunicipal()): ?>
					<li>Municipal/City landfill area</li>
				<?php endif; ?>
				<?php if($description->getSolidWasteOthers()): ?>
					<p>Other:&nbsp;<?php echo $description->getSolidWasteOthersSpecify() ?></p>
				<?php endif; ?>
				</ul>
				</div>
				<div class="well">
				<h4>Manpower and Employment:Number of people employed by the project</h4>
				<ul>
				<li>Design/Implementation:&nbsp;<b><?php echo $description->getManPowerEmploymentImplementation() ?></b></li>
				<li>Operation and maintenance:&nbsp;<b><?php echo $description->getManPowerEmploymentOperation() ?></b></li>
				</div>
				<div class="well">
				<h4>Project Implementation duration:</h4>
				<p>Period:&nbsp;<b><?php echo $description->getImplementationDuration() ?></b></p>
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
				<h4><i class="icon-reorder"></i>Project Surroundings</h4>
			</div>
			<div class="widget-body">
			<div class="well well-large">
			<h4>Physical Environment</h4>
			<?php foreach($surroundings as $surrounding): ?>
				<div class="well">
				<p>General elevation of project area:&nbsp;<b><?php echo $surrounding->getProjectGeneralElevation() ?>masl</b></p>
				</div>
				<div class="well">
				<h4>Soil erosion indications</h4>
				<?php if($surrounding->getSoilErosion()): ?>
				<p>Area in site indicate soil erosion</p>
					<b>Causes:</b><br/>
					<ul>
					<?php if($surrounding->getSoilErosionHeavyRains()): ?>
					<li>Heavy rains</li>
					<?php endif; ?>
					<?php if($surrounding->getSoilErosionUnstable()): ?>
					<li>Unstable slopes</li>
					<?php endif; ?>
					<?php if($surrounding->getSoilErosionOthers()): ?>
					<p>Others:&nbsp;<?php echo $surrounding->getSoilErosionOthersSpecify() ?></p>
					<?php endif; ?>
					</ul>
				<?php endif; ?>
				<?php if(!$surrounding->getSoilErosion()): ?>
				<p>Area in site do not indicate soil erosion</p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Existence of water bodies</h4>
				<?php if($surrounding->getExistingWaterBody()): ?>
				<p> Water bodies found near/ within the site</p>
					<div class="well">
					<h4>Remarks</h4>
					<p><?php echo $surrounding->getExistingWaterBodyRemark() ?></p>
					</div>
				<?php endif; ?>
				<?php if(!$surrounding->getExistingWaterBody()): ?>
				<p>No existing water bodies found near/ within the site</p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Access road going to the site</h4>
				<?php if($surrounding->getAccessRoad()): ?>
				<p>Access road exists.Distance to site:&nbsp;<b><?php echo $surrounding->getAccessRoadDistance() ?>Km</b><p>
				<p>Type of road:&nbsp;<?php echo $surrounding->getAccessRoadType() ?></p>
				<?php endif; ?>
				<?php if(!$surrounding->getAccessRoad()): ?>
				<p>No access road to site</p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Land Use:</h4>
				<?php if($surrounding->getSiteConformApproval()): ?>
				<p>Conforms to the approves land use plan of the city/District</p>
					<div class="well">
					<h4>Remarks</h4>
					<p><?php echo $surrounding->getSiteConformRemark() ?></p>
					</div>
				<?php endif; ?>
				<?php if(!$surrounding->getSiteConformApproval()): ?>
				<p>Does not conform to the approves land use plan of the city/District</p>
					<div class="well">
					<h4>Remarks</h4>
					<p><?php echo $surrounding->getSiteConformRemark() ?></p>
					</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Structures and Developments:</h4>
				<?php if($surrounding->getSiteExistingStructure()): ?>
				<p>Existence of structures/developments around the site</p>
					<div class="well">
					<h4>Remarks</h4>
					<p><?php echo $surrounding->getSiteExistingRemark() ?></p>
					</div>
				<?php endif; ?>
				<?php if(!$surrounding->getSiteExistingStructure()): ?>
				<p>No existing stuctures/developments around the site</p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Present land use:</h4>
				<ul>
				<?php if($surrounding->getLandUseAgriculture()): ?>
				<li>Agricultural land</li>
				<?php endif; ?>
				<?php if($surrounding->getLandUseGrassland()): ?>
				<li>Grassland</li>
				<?php endif; ?>
				<?php if($surrounding->getLandUseBuiltup()): ?>
				<li>Built-up</li>
				<?php endif; ?>
				<?php if($surrounding->getLandUseMarshland()): ?>
				<li>Marshland</li>
				<?php endif; ?>
				<?php if($surrounding->getLandUseOther()): ?>
				<p>Others:&nbsp;<?php echo $surrounding->getLandUseOtherSpecify() ?></p>
				<?php endif; ?>
				</ul>
				</div>
			</div>
			<div class="well well-large">
			<h4>Biological Environment</h4>
				<div class="well">
				<h4>Vegetation:</h4>
				<?php if($surrounding->getExistingTrees()): ?>
				<p>Existence of trees and other types of vegetation in the site</p>
				<div class="well">
				<h4>Examples of vegetation:</h4>
				<p><?php echo $surrounding->getExistingTreesRemark() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$surrounding->getExistingTrees()): ?>
				<p>No existence of trees and other types of vegetation in the site</p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Birds and Wildlife:</h4>
				<?php if($surrounding->getWildlifeExisting()): ?>
				<p>Existence of birds and other wildlife found in the site</p>
				<div class="well">
				<h4>Remarks</h4>
				<p><?php echo $surrounding->getWildlifeExistingRemark() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$surrounding->getWildlifeExisting()): ?>
				<p>No existence of birds and other wildlife found in the site</p>
				<div class="well">
				<h4>Remarks</h4>
				<p><?php echo $surrounding->getWildlifeExistingRemark() ?></p>
				</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Fishery resources</h4>
				<?php if($surrounding->getFisheryExisting()): ?>
				<p>Existence of fishery resources in water bodies found near/within the site</p>
				<div class="well">
				<h4>Remarks</h4>
				<p><?php echo $surrounding->getFisheryExistingRemark() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$surrounding->getFisheryExisting()): ?>
				<p>No existence of fishery resources in water bodies found near/within the site</p>
				<div class="well">
				<h4>Remarks</h4>
				<p><?php echo $surrounding->getFisheryExistingRemark() ?></p>
				</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Watershed/Forest reservation:</h4>
				<?php if($surrounding->getWatershedExisting()): ?>
				<p>Site is near or within a watershed/forest reservation</p>
					<?php if(!is_null($surrounding->getWatershedNearDistance())): ?>
					<blockquote>Watershed/forest reservation area near site. Distance from site:&nbsp;<b><?php echo $surrounding->getWatershedNearDistance() ?>&nbsp;<?php echo $surrounding->getWatershedNearDistanceUnits() ?></b></blockquote>
					<?php endif; ?>
					<?php if(!is_null($surrounding->getWatershedWithinName())): ?>
					<blockquote>Watershed/forest reservation area is within</blockquote>
						<div class="well">
						<h4>Watershed/forest reservation area names:</h4>
						<p><?php echo $surrounding->getWatershedWithinName() ?></p>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Examples of species found within/around the site:</h4>
				<?php foreach($surrounding->getEIAProjectSurroundingSpecies() as $species): ?>
				<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Birds and other wildlife</th>
						<th>Trees and other vegetation</th>
						<th>Fishery resources</th>
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
			<div class="well well-large">
			<h4>Socio-Economic Environment</h4>
			<?php foreach($economics as $economic): ?>
				<div class="well">
				<h4>Settlements:</h4>
				<?php if($economic->getExistingSettlements()): ?>
				<p>Existing settlements in the project</p>
				<div class="well">
				<h4>Remarks</h4>
				<p><?php echo $economic->getExistingSettlementsRemark() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$economic->getExistingSettlements()): ?>
				<p>No existing settlements in the project</p>
				<div class="well">
				<h4>Remarks</h4>
				<p><?php echo $economic->getExistingSettlementsRemark() ?></p>
				</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<?php if(!is_null($economic->getAverageFamilySize())): ?>
				<h4>Family:</h4>
				<p>Average family size:&nbsp;<b><?php echo $economic->getAverageFamilySize() ?></b></p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Sources of livelihood:</h4>
				<ul>
				<?php if($economic->getLivelihoodFarming()): ?>
					<li>Farming</li>
				<?php endif; ?>
				<?php if($economic->getLivelihoodFishing()): ?>
					<li>Fishing</li>
				<?php endif; ?>
				<?php if($economic->getLivelihoodVending()): ?>
					<li>Vending</li>
				<?php endif; ?>
				<?php if($economic->getLivelihoodOthers()): ?>
					<p>Others:&nbsp;<?php echo $economic->getLivelihoodOthersSpecify() ?></p>
				<?php endif; ?>
				</ul>
				<?php if(!is_null($economic->getLivelihoodRemarks())): ?>
					<div class="well">
					<h4>Remarks:</h4>
					<p><?php echo $economic->getLivelihoodRemarks() ?></p>
					</div>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Local organizations:</h4>
				<?php if($economic->getLocalOrganization()): ?>
				<p>Existence of local organizations in the area</p>
				<div class="well">
					<h4>Organizations:</h4>
					<p><?php echo $economic->getLocalOrganizationDescription() ?></p>
				</div>
				<?php endif; ?>
				<?php if(!$economic->getLocalOrganization()): ?>
				<p>No existence of local organizations in the area</p>
				<?php endif; ?>
				</div>
				<div class="well">
				<h4>Social Infrastructures:</h4>
				<?php if($economic->getSocialInfrastructures()): ?>
					<p>Existence of social infrastructures in the project site</p>
					<b>Available social infrastructures:</b>
					<ul>
					<?php if($economic->getSocialSchools()): ?>
					<li>Schools</li>
					<?php endif; ?>
					<?php if($economic->getSocialHealthCenters()): ?>
					<li>Health centers</li>
					<?php endif; ?>
					<?php if($economic->getSocialHospital()): ?>
					<li>Hospitals</li>
					<?php endif; ?>
					<?php if($economic->getSocialTransportation()): ?>
					<li>Transportation</li>
					<?php endif; ?>
					<?php if($economic->getSocialCommunication()): ?>
					<li>Communication</li>
					<?php endif; ?>
					<?php if($economic->getSocialChurches()): ?>
					<li>Churches/Chapel</li>
					<?php endif; ?>
					<?php if($economic->getSocialRoads()): ?>
					<li>Roads</li>
					<?php endif; ?>
					<?php if($economic->getSocialOthers()): ?>
					<p>Others:&nbsp;<?php echo $economic->getSocialOthersSpecify() ?></p>
					<?php endif; ?>
					</ul>
				<?php endif; ?>
				<?php if(!$economic->getSocialInfrastructures()): ?>
				<p>No existence of social infrastructures in the project site</p>
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
				<h4><i class="icon-reorder"></i>Predicted Impact and Proposed Enhancement/Mitigation Measures</h4>
			</div>
			<div class="widget-body">
			<?php foreach($impacts as $impact): ?>
			<div class="well well-large">
			<h4>Project design and implementation phase</h4>
					<div class="well">
					<h4>Impact -- dust</h4>
					<?php if($impact->getDustGeneration()): ?>
					<p>Increase in dust generation due to clearing,civil works and earthmoving activities</p>
					<b>Proposed enhancement:</b>
						<ul>
						<?php if($impact->getDustGenerationWatering()): ?>
						<li>Regular watering of unpaved roads or exposed soils/ground</li>
						<?php endif; ?>
						<?php if($impact->getDustGenerationRemoveSoil()): ?>
						<li>Remove soil /mud from tires of trucks and equipment before leaving the area</li>
						<?php endif; ?>
						<?php if($impact->getDustGenerationHaulingTrucks()): ?>
						<li>Hauling trucks should be covered with canvass or any equivalent materials</li>
						<?php endif; ?>
						<?php if($impact->getDustGenerationTemporaryFence()): ?>
						<li>Set-up temporary fence around the construction area</li>
						<?php endif; ?>
						</ul>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getDustGenerationRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getDustGeneration()): ?>
					<p>No increase in dust generation due to clearing,civil works and earthmoving activities</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getDustGenerationRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact -- top soil</h4>
					<?php if($impact->getSoilRemoval()): ?>
					<p>Top soil removal and loss due earthmoving activities, transport, access road construction</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getSoilRemovalMitigateStockpile()): ?>
					<li>Stockpile the top soil in a safe place and use as final grading material or final layer</li>
					<?php endif; ?>
					<?php if($impact->getSoilRemovalMitigateRevegetate()): ?>
					<li>Rip-rap or re-vegetate  the area</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getSoilRemovalRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getSoilRemoval()): ?>
					<p>No top soil removal and loss due earthmoving activities, transport, access road construction</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getSoilRemovalRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- erosion</h4>
					<?php if($impact->getErosionFromCuts()): ?>
					<p>Erosion from exposed  cuts and landslides  due to earthmoving and excavation activities</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getErosionMitigateConstructDryseason()): ?>
					<li>Conduct construction activities during dry season</li>
					<?php endif; ?>
					<?php if($impact->getErosionMitigateAvoidExposure()): ?>
					<li>Avoid long exposure of opened cuts</li>
					<?php endif; ?>
					<?php if($impact->getErosionMitigateBarrierNets()): ?>
					<li>Installation of barrier nets</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getErosionRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getErosionFromCuts()): ?>
					<p>No erosion from exposed  cuts and landslides  due to earthmoving and excavation activities</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getErosionRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- sedimentation</h4>
					<?php if($impact->getSedimentation()): ?>
					<p>Sedimentation/siltation of drainage or waterways from unconfined stockpiles of soil and other materials</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getSedimentationMitigateSiltTrap()): ?>
					<li>Set-up temporary silt trap/ponds to prevent  siltation</li>
					<?php endif; ?>
					<?php if($impact->getSedimentationMitigateProperStockpilling()): ?>
					<li>Proper stockpiling of spoils(on flat areas and away from drainage routes)</li>
					<?php endif; ?>
					<?php if($impact->getSedimentationMitigateFillingMaterials()): ?>
					<li>Spoils generated from civil works be disposed as filling materials</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getSedimentationRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getSedimentation()): ?>
					<p>No erosion from exposed  cuts and landslides  due to earthmoving and excavation activities</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getSedimentationRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- pollution</h4>
					<?php if($impact->getPollution()): ?>
					<p>Pollution of nearby water body due to improper disposal of construction wastes</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getPollutionMitigateTemporaryDisposal()): ?>
					<li>Set-up temporary disposal mechanism within the construction area and properly dispose the generated solid wastes</li>
					<?php endif; ?>
					<?php if($impact->getPollutionMitigateToiletFacilities()): ?>
					<li>Set up proper and adequate toilet facilities</li>
					<?php endif; ?>
					<?php if($impact->getPollutionMitigateContractObserve()): ?>
					<li>Strictly require the contractor and its workers to observe proper waste disposal and proper sanitation</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getPollutionRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getPollution()): ?>
					<p>No pollution of nearby water body due to improper disposal of construction wastes</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getPollutionRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well"> 
					<h4>Impact --- vegetation</h4>
					<?php if($impact->getVegetationLoss()): ?>
					<p>Loss of vegetation due to land clearing</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getVegetationLimitClearing()): ?>
					<li>Limit land clearing as much as possible</li>
					<?php endif; ?>
					<?php if($impact->getVegetationProvideClearing()): ?>
					<li>Provide temporary fencing to vegetation that will be retained</li>
					<?php endif; ?>
					<?php if($impact->getVegetationUseMarkers()): ?>
					<li>Use of markers and fences to direct heavy equipment traffic in the construction site and avoid damage to plants</li>
					<?php endif; ?>
					<?php if($impact->getVegetationReplant()): ?>
					<li>Re-plant/ plant indigenous tree species and ornamental plants</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getVegetationRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getVegetationLoss()): ?>
					<p>No loss of vegetation due to land clearing</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getVegetationRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- wildlife</h4>
					<?php if($impact->getDisturbance()): ?>
					<p>Disturbance or loss of wildlife within the influence area due to noise and other construction activities</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getDisturbanceReestablish()): ?>
					<li>Re-establish or simulate the habitat of affected wildlife in another suitable area</li>
					<?php endif; ?>
					<?php if($impact->getDisturbanceSchedule()): ?>
					<li>Schedule noisy construction activities during day time</li>
					<?php endif; ?>
					<?php if($impact->getDisturbanceMaintenance()): ?>
					<li>Undertake proper maintenance of equipment and use mufflers</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getDisturbanceRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getDisturbance()): ?>
					<p>No disturbance or loss of wildlife within the influence area due to noise and other construction activities</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getDisturbanceRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- noise:</h4>
					<?php if($impact->getNoiseGeneration()): ?>
					<p>Noise generation that can affect the nearby resident</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getNosieGenerationSchedule()): ?>
					<li>Schedule noisy construction activities during day time</li>
					<?php endif; ?>
					<?php if($impact->getNoiseGenerationUndertake()): ?>
					<li>Undertake proper maintenance of equipment and use mufflers</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getNoiseGenerationRemark() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getNoiseGeneration()): ?>
					<p>No noise generation that can affect the nearby resident</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getNoiseGenerationRemark() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- employment</h4>
					<?php if($impact->getGenerationEmployment()): ?>
					<p>Generation of employment</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getGenerationEmploymentHiring()): ?>
					<li>Hiring priority shall be given to qualified local residents</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getGenerationEmploymentRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getGenerationEmployment()): ?>
					<p>No generation of employment</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getGenerationEmploymentRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- right of way</h4>
					<?php if($impact->getConflicts()): ?>
					<p>Conflicts in right of way</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getConflictConslutation()): ?>
					<li>Conduct consultation and settle agreements before finalizing detailed design</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getConflictRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getConflicts()): ?>
					<p>No conflicts in right of way</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getConflictRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- traffic</h4>
					<?php if($impact->getTrafficCongestion()): ?>
					<p>Increased traffic and possible congestion</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getTrafficRulesAdherance()): ?>
					<li>Strict enforcement of traffic rules and regulations</li>
					<?php endif; ?>
					<?php if($impact->getTrafficeAidProvision()): ?>
					<li>Proponent should provide traffic aid during peak hours</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getTrafficCongestionRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getTrafficCongestion()): ?>
					<p>No increased traffic and possible congestion</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getTrafficCongestionRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- crime and accidents:</h4>
					<?php if($impact->getCrimesAccidents()): ?>
					<p>Increase in the incidence of crime and accidents</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impact->getCrimesAccidentsSafetyRules()): ?>
					<li>Strictly require the contractor and its  workers to follow safety rules and regulations in the construction and in the locality (in coordination with local  authorities) </li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impact->getCrimeAccidentsRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impact->getCrimesAccidents()): ?>
					<p>No increase in the incidence of crime and accidents</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impact->getCrimeAccidentsRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
			</div>
			<?php endforeach; ?>
			<div class="well well-large">
			<h4>Operation Phase</h4>
				<?php foreach($impactsOperation as $impactOperation): ?>
					<div class="well">
					<h4>Impact --- domestic effluents</h4>
					<?php if($impactOperation->getDomesticInfluence()): ?>
					<p>Generation of domestic effluents</p>
					<b>Proposed enhancement:</b>
					<ul>
					<?php if($impactOperation->getDomesticWastewaterTreatment()): ?>
					<li>Provision of adequate wastewater treatment facilities</li>
					<?php endif; ?>
					</ul>
					<div class="well">
						<h4>Remarks</h4>
						<p><?php echo $impactOperation->getDomesticInfluenceRemarks() ?></p>
					</div>
					<?php endif; ?>
					<?php if(!$impactOperation->getDomesticInfluence()): ?>
					<p>No generation of domestic effluents</p>
					<div class="well">
						<h4>Remarks:</h4>
						<p><?php echo $impactOperation->getDomesticInfluenceRemarks() ?></p>
					</div>
					<?php endif; ?>
					</div>
					<div class="well">
					<h4>Impact --- soild waste</h4>
					<?php if($impactOperation->getSolidWastes()): ?>
						<p>Generation of solid wastes</p>
						<b>Proposed enhancement:</b>
							<ul>
							<?php if($impactOperation->getSolidWastesSegregation()): ?>
							<li>Segregation of recyclable materials</li>
							<?php endif; ?>
							<?php if($impactOperation->getSolidWastesProperCollection()): ?>
							<li>Proper collection and disposal of solid wastes</li>
							<?php endif; ?>
							<?php if($impactOperation->getSolidWastesProperHousekeeping()): ?>
							<li>Proper housekeeping and waste minimization</li>
							<?php endif; ?>
							</ul>
							<div class="well">
								<h4>Remarks</h4>
								<p><?php echo $impactOperation->getSolidWastesRemarks() ?></p>
							</div>
						<?php endif; ?>
						<?php if(!$impactOperation->getSolidWastes()): ?>
						<p>No generation of solid wastes</p>
							<div class="well">
								<h4>Remarks:</h4>
								<p><?php echo $impactOperation->getSolidWastesRemarks() ?></p>
							</div>
						<?php endif; ?>
					</div>
					<div class="well">
						<h4>Impact --- traffic</h4>
						<?php if($impactOperation->getIncreasedTraffic()): ?>
						<p>Increased traffic and possible congestion as well as increase risk of vehicular and related accidents</p>
						<b>Proposed enhancement:</b>
							<ul>
							<?php if($impactOperation->getIncreasedTrafficRulesAdhere()): ?>
							<li>Strict enforcement of traffic rules and  regulations</li>
							<?php endif; ?>
							<?php if($impactOperation->getIncreasedTrafficSignables()): ?>
							<li>Placement of signage and warnings in appropriate places</li>
							<?php endif; ?>
							</ul>
							<div class="well">
								<h4>Remarks</h4>
								<p><?php echo $impactOperation->getIncreasedTrafficeRemarks() ?></p>
							</div>
						<?php endif; ?>
						<?php if(!$impactOperation->getIncreasedTraffic()): ?>
						<p>No increased traffic and possible congestion as well as increase risk of vehicular and related accidents</p>
							<div class="well">
								<h4>Remarks:</h4>
								<p><?php echo $impactOperation->getIncreasedTrafficeRemarks() ?></p>
							</div>
						<?php endif; ?>
					</div>
					<div class="well">
						<h4>Impact --- fire</h4>
						<?php if($impactOperation->getFireRisk()): ?>
						<p>Risk of fire</p>
						<b>Proposed enhancement:</b>
							<ul>
							<?php if($impactOperation->getFireRiskExtinguishers()): ?>
							<li>Fire extinguishers in good working condition installed in each corner</li>
							<?php endif; ?>
							<?php if($impactOperation->getFireRiskExitStairs()): ?>
							<li>Exit stairs provided and shown on plans clearly posted at entrance</li>
							<?php endif; ?>
							</ul>
							<div class="well">
								<h4>Remarks</h4>
								<p><?php echo $impactOperation->getFireRiskRemarks() ?></p>
							</div>
						<?php endif; ?>
						<?php if(!$impactOperation->getFireRisk()): ?>
						<p>No risk of fire</p>
							<div class="well">
								<h4>Remarks:</h4>
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
		<p><?php echo __('Proceed to allocate an impact level for the project') ?>.</p>
		<?php echo button_to('Proceed','eiaDataAdmin/impact?id='.$detail->getEiaprojectId(),array('class' => 'btn btn-success')) ?>
	</div>
	<div class="modal-footer">
		<button data-dismiss="modal" class="close" type="button"><?php echo __('X') ?></button>
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
	<button type="button" class="btn btn-inverse"><?php echo __('Project Impact') ?></button></a>
	<a href="#widget-reject" data-toggle="modal">
	<button type="button" class="btn btn-inverse"><?php echo __('Reject') ?></button></a>
</div>