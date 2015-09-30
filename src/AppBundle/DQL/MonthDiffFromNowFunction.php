<?php

namespace AppBundle\DQL;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

/**
 * Class MonthDiffFromNowFunction
 */
class MonthDiffFromNowFunction extends FunctionNode
{

    protected $dateFromNow;

    protected $months;

    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->dateFromNow = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(SqlWalker $walker)
    {
        return 'DATEDIFF('. $this->dateFromNow->dispatch($walker) . ', NOW())';
    }
}
