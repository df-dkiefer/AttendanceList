<?php

namespace srag\DIC\AttendanceList\Database;

use ilDBStatement;
use ilPDOStatement;
use PDOStatement;
use srag\DIC\AttendanceList\Exception\DICException;

/**
 * Class PdoStatementContextHelper
 *
 * @package srag\DIC\AttendanceList\Database
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 *
 * @internal
 */
final class PdoStatementContextHelper extends ilPDOStatement {

	/**
	 * @param ilDBStatement $stm
	 *
	 * @return PDOStatement
	 *
	 * @throws DICException PdoStatementContextHelper only supports ilPDOStatement!
	 *
	 * @internal
	 */
	public static function getPdoStatement(ilDBStatement $stm) {
		if (!($stm instanceof ilPDOStatement)) {
			throw new DICException("PdoStatementContextHelper only supports ilPDOStatement!");
		}

		return $stm->pdo_statement;
	}


	/**
	 * PdoStatementContextHelper constructor
	 *
	 * @throws DICException
	 */
	public function __construct() {
		throw new DICException("");

		parent::__construct(self::getPdoStatement($this));
	}
}
