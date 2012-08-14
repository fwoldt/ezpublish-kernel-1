<?php
/**
 * File containing the ContentInfo ValueObjectVisitor class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Output\ValueObjectVisitor;

use eZ\Publish\Core\REST\Common\Output\ValueObjectVisitor;
use eZ\Publish\Core\REST\Common\Output\Generator;
use eZ\Publish\Core\REST\Common\Output\Visitor;

/**
 * ContentInfo value object visitor
 */
class ContentInfo extends ValueObjectVisitor
{
    /**
     * Visit struct returned by controllers
     *
     * @param \eZ\Publish\Core\REST\Common\Output\Visitor $visitor
     * @param \eZ\Publish\Core\REST\Common\Output\Generator $generator
     * @param mixed $data
     */
    public function visit( Visitor $visitor, Generator $generator, $data )
    {
        $generator->startObjectElement( 'ContentInfo' );
        $visitor->setHeader( 'Content-Type', $generator->getMediaType( 'ContentInfo' ) );

        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'object', array( 'object' => $data->id ) )
        );
        $generator->endAttribute( 'href' );

        $generator->startAttribute( 'id', $data->id );
        $generator->endAttribute( 'id' );

        $generator->startObjectElement( 'ContentType' );
        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'type', array( 'type' => $data->getContentType()->id ) )
        );
        $generator->endAttribute( 'href' );
        $generator->endObjectElement( 'ContentType' );

        $generator->startValueElement( 'name', $data->name );
        $generator->endValueElement( 'name' );

        $generator->endObjectElement( 'ContentInfo' );
    }
}
