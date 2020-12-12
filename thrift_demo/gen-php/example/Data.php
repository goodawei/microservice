<?php
namespace example;

/**
 * Autogenerated by Thrift Compiler (0.11.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;
use JsonSerializable;
use stdClass;


class Data implements JsonSerializable {
  static $isValidate = true;

  static $_TSPEC = array(
    1 => array(
      'var' => 'text',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    );

  /**
   * @var string
   */
  public $text = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['text'])) {
        $this->text = $vals['text'];
      }
    }
  }

  public function getName() {
    return 'Data';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->text);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $this->_validateForWrite();
    $xfer = 0;
    $xfer += $output->writeStructBegin('Data');
    if ($this->text !== null) {
      $xfer += $output->writeFieldBegin('text', TType::STRING, 1);
      $xfer += $output->writeString($this->text);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

  private function _validateForWrite() {
    if ($this->text === null) {
      throw new TProtocolException('Required field Data.text is unset!');
    }
  }

  public function jsonSerialize() {
    $this->_validateForWrite();
    $json = new stdClass;
    if ($this->text !== null) {
      $json->text = (string)$this->text;
    }
    return $json;
  }

}

