			Job Posting Expiration After Creation:
			<select name="job_posting_length">
				<option name="job_posting_length_dummy" value="">&nbsp;</option>
				<option name="job_posting_length_low" value="<?php get_option(job_posting_length);?>">30 days</option>
				<option name="job_posting_length_med" value="60">60 days</option>
				<option name="job_posting_length_high" value="90">90 days</option>
			</select>
			<br />
			What category will you be editing?
			<select name="job_posting_category_list">
					<option name="dummy">&nbsp;</option>
				<?php
					foreach($job_posting_category as $job_posting_categories => $items): ?>
					<option value="<?php echo $job_posting_categories ?>"<?php if( $job_posting_categories == $result['job_posting_category_list'] ): ?> selected="selected"<?php endif; ?>><?php echo $items ?></option>
					<?php endforeach; ?>
			</select>
            <p class="submit">
                <input type="submit" class="button-primary" value="Save Changes" />
            </p>


