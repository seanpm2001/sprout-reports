<?php
namespace Craft;

/**
 * Class SproutReportsVariable
 *
 * @package Craft
 */
class SproutReportsVariable
{
	/**
	 * @var SproutReportsPlugin
	 */
	protected $plugin;

	public function __construct()
	{
		$this->plugin = craft()->plugins->getPlugin('sproutreports');
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->plugin->getName();
	}

	/**
	 * @return string
	 */
	public function getVersion()
	{
		return $this->plugin->getVersion();
	}

	/**
	 * @return SproutReportsBaseDataSource[]
	 */
	public function getDataSources()
	{
		return sproutReports()->dataSources->getAllDataSources();
	}

	/**
	 * @return null|SproutReports_ReportModel[]
	 */
	public function getReports()
	{
		return sproutReports()->reports->getAll();
	}

	/**
	 * @return null|SproutReports_ReportGroupModel[]
	 */
	public function getReportGroups()
	{
		return sproutReports()->reportGroups->getAllReportGroups();
	}

	/**
	 * @param $id
	 *
	 * @return null|SproutReports_ReportGroupModel[]
	 */
	public function getReportsByGroupId($id)
	{
		return sproutReports()->reports->getReportsByGroupId($id);
	}

	/**
	 * @param int $id
	 *
	 * @return SproutReports_ReportModel
	 */
	public function getReportById($id)
	{
		return sproutReports()->reports->get($id);
	}

	public function getReportsAsSelectFieldOptions()
	{
		$options = array();
		$reports = $this->getReports();

		if ($reports)
		{
			foreach ($reports as $report)
			{
				$options[] = array(
					'label' => $report->name,
					'value' => $report->id,
				);
			}
		}
		return $options;
	}

	public function runReport($id, array $options = array())
	{
		$report = sproutReports()->reports->get($id);

		if ($report)
		{
			$dataSource = sproutReports()->dataSources->getDataSourceById($report->dataSourceId);

			if ($dataSource)
			{
				$values = $dataSource->getResults($report);

				if (!empty($values) && empty($labels))
				{
					$labels = array_keys($values[0]);
				}

				return compact('values', 'labels');
			}
		}
	}
}
