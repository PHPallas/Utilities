<?php

/*
 * This file is part of the PHPallas package.
 *
 * (c) Sina Kuhestani <sinakuhestani@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPallas\Utilities;


/**
 * Class ImageUtility
 * A utility class for basic image manipulation using GD functions.
 */
class ImageUtility {

    /**
     * Creates an image from a string.
     *
     * @param string $data The image data as a string.
     * @return resource|bool The image resource or false on failure.
     */
    public static function imagecreatefromstring($data) {
        return imagecreatefromstring($data);
    }

    /**
     * Creates a true color image.
     *
     * @param int $width The width of the image.
     * @param int $height The height of the image.
     * @return resource A new true color image resource.
     */
    public static function imagecreatetruecolor($width, $height) {
        return imagecreatetruecolor($width, $height);
    }

    /**
     * Resizes an image to the specified width and height.
     *
     * @param string $sourcePath The path to the source image.
     * @param string $destinationPath The path to save the resized image.
     * @param int $newWidth The new width of the image.
     * @param int $newHeight The new height of the image.
     * @return bool True on success, false on failure.
     */
    public static function resize($sourcePath, $destinationPath, $newWidth, $newHeight) {
        $image = self::imagecreatefromstring(file_get_contents($sourcePath));
        if ($image === false) {
            return false; // Failed to create image
        }

        list($width, $height) = getimagesize($sourcePath);
        $resizedImage = self::imagecreatetruecolor($newWidth, $newHeight);

        // Resize the image
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
        // Save the resized image
        $result = imagejpeg($resizedImage, $destinationPath, 100);
        
        // Clean up
        imagedestroy($image);
        imagedestroy($resizedImage);
        
        return $result;
    }

    /**
     * Crops an image to the specified dimensions.
     *
     * @param string $sourcePath The path to the source image.
     * @param string $destinationPath The path to save the cropped image.
     * @param int $x The x-coordinate of the top-left corner of the crop area.
     * @param int $y The y-coordinate of the top-left corner of the crop area.
     * @param int $width The width of the crop area.
     * @param int $height The height of the crop area.
     * @return bool True on success, false on failure.
     */
    public static function crop($sourcePath, $destinationPath, $x, $y, $width, $height) {
        $image = self::imagecreatefromstring(file_get_contents($sourcePath));
        if ($image === false) {
            return false; // Failed to create image
        }

        $croppedImage = self::imagecreatetruecolor($width, $height);
        
        // Crop the image
        imagecopy($croppedImage, $image, 0, 0, $x, $y, $width, $height);
        
        // Save the cropped image
        $result = imagejpeg($croppedImage, $destinationPath, 100);
        
        // Clean up
        imagedestroy($image);
        imagedestroy($croppedImage);
        
        return $result;
    }

    /**
     * Adds a watermark to an image.
     *
     * @param string $sourcePath The path to the source image.
     * @param string $watermarkPath The path to the watermark image.
     * @param string $destinationPath The path to save the watermarked image.
     * @param int $x The x-coordinate for the watermark placement.
     * @param int $y The y-coordinate for the watermark placement.
     * @return bool True on success, false on failure.
     */
    public static function addWatermark($sourcePath, $watermarkPath, $destinationPath, $x, $y) {
        $image = self::imagecreatefromstring(file_get_contents($sourcePath));
        if ($image === false) {
            return false; // Failed to create image
        }

        $watermark = self::imagecreatefromstring(file_get_contents($watermarkPath));
        if ($watermark === false) {
            return false; // Failed to create watermark
        }
        
        // Merge the watermark with the image
        imagecopy($image, $watermark, $x, $y, 0, 0, imagesx($watermark), imagesy($watermark));
        
        // Save the watermarked image
        $result = imagejpeg($image, $destinationPath, 100);
        
        // Clean up
        imagedestroy($image);
        imagedestroy($watermark);
        
        return $result;
    }

    /**
     * Rotates an image by a specified angle.
     *
     * @param string $sourcePath The path to the source image.
     * @param string $destinationPath The path to save the rotated image.
     * @param float $angle The angle in degrees to rotate the image.
     * @param array $backgroundColor The RGB background color for empty areas.
     * @return bool True on success, false on failure.
     */
    public static function rotate($sourcePath, $destinationPath, $angle, $backgroundColor = [255, 255, 255]) {
        $image = self::imagecreatefromstring(file_get_contents($sourcePath));
        if ($image === false) {
            return false; // Failed to create image
        }

        // Rotate the image
        $rotatedImage = imagerotate($image, $angle, imagecolorallocate($image, $backgroundColor[0], $backgroundColor[1], $backgroundColor[2]));
        
        // Save the rotated image
        $result = imagejpeg($rotatedImage, $destinationPath, 100);
        
        // Clean up
        imagedestroy($image);
        imagedestroy($rotatedImage);
        
        return $result;
    }

    /**
     * Converts an image to a different format (JPEG, PNG, GIF).
     *
     * @param string $sourcePath The path to the source image.
     * @param string $destinationPath The path to save the converted image.
     * @param string $format The desired format ('jpeg', 'png', 'gif').
     * @return bool True on success, false on failure.
     */
    public static function convertFormat($sourcePath, $destinationPath, $format) {
        $image = self::imagecreatefromstring(file_get_contents($sourcePath));
        if ($image === false) {
            return false; // Failed to create image
        }

        switch (strtolower($format)) {
            case 'jpeg':
            case 'jpg':
                $result = imagejpeg($image, $destinationPath, 100);
                break;
            case 'png':
                $result = imagepng($image, $destinationPath);
                break;
            case 'gif':
                $result = imagegif($image, $destinationPath);
                break;
            default:
                return false; // Unsupported format
        }
        
        // Clean up
        imagedestroy($image);
        
        return $result;
    }

    /**
     * Applies a filter to an image.
     *
     * @param string $sourcePath The path to the source image.
     * @param string $destinationPath The path to save the filtered image.
     * @param int $filterType The filter type to apply (e.g., IMG_FILTER_GRAYSCALE).
     * @return bool True on success, false on failure.
     */
    public static function applyFilter($sourcePath, $destinationPath, $filterType) {
        $image = self::imagecreatefromstring(file_get_contents($sourcePath));
        if ($image === false) {
            return false; // Failed to create image
        }

        // Apply the filter
        if (imagefilter($image, $filterType)) {
            // Save the filtered image
            $result = imagejpeg($image, $destinationPath, 100);
        } else {
            $result = false; // Filter application failed
        }
        
        // Clean up
        imagedestroy($image);
        
        return $result;
    }
}